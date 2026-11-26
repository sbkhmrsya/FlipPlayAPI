<?php

namespace Tests\Feature;

use App\Models\Media;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MediaApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_media_can_be_created_with_its_details(): void
    {
        $response = $this->postJson('/api/media', [
            'judul' => 'Sousou no Frieren',
            'jenis' => 'Anime',
            'genre' => 'Adventure, Drama, Fantasy',
            'episodes' => 28,
            'score' => 9.24,
        ]);

        $response->assertCreated()
            ->assertJsonPath('data.judul', 'Sousou no Frieren')
            ->assertJsonPath('data.episodes', 28);

        $this->assertDatabaseHas('media', [
            'judul' => 'Sousou no Frieren',
            'jenis' => 'Anime',
            'is_available' => true,
        ]);
    }

    public function test_media_can_be_searched_and_filtered_by_availability(): void
    {
        Media::factory()->create([
            'judul' => 'Sousou no Frieren',
            'is_available' => true,
        ]);
        Media::factory()->create([
            'judul' => 'Lovely Runner',
            'is_available' => false,
        ]);

        $response = $this->getJson('/api/media?search=Frieren&is_available=1');

        $response->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.judul', 'Sousou no Frieren');
    }

    public function test_invalid_availability_filters_are_rejected(): void
    {
        $response = $this->getJson('/api/media?is_available=sometimes');

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['is_available']);
    }

    public function test_duplicate_media_titles_are_rejected(): void
    {
        Media::factory()->create(['judul' => 'Sousou no Frieren']);

        $response = $this->postJson('/api/media', [
            'judul' => 'Sousou no Frieren',
            'jenis' => 'Anime',
            'genre' => 'Fantasy',
        ]);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['judul']);
        $this->assertDatabaseCount('media', 1);
    }

    public function test_media_availability_can_be_updated(): void
    {
        $media = Media::factory()->create(['is_available' => true]);

        $response = $this->patchJson("/api/media/{$media->id}", [
            'is_available' => false,
        ]);

        $response->assertOk()
            ->assertJsonPath('data.is_available', false);
        $this->assertDatabaseHas('media', [
            'id' => $media->id,
            'is_available' => false,
        ]);
    }

    public function test_unavailable_media_cannot_be_added_to_a_user_collection(): void
    {
        $user = User::factory()->create();
        $media = Media::factory()->create(['is_available' => false]);

        $response = $this->postJson("/api/media/{$media->id}/add-to-collection", [
            'user_id' => $user->id,
        ]);

        $response->assertConflict()
            ->assertJsonPath('message', 'Media tidak tersedia di library.');
        $this->assertDatabaseMissing('media_user', [
            'media_id' => $media->id,
            'user_id' => $user->id,
        ]);
    }

    public function test_available_media_can_be_added_and_removed_from_a_user_collection(): void
    {
        $user = User::factory()->create();
        $media = Media::factory()->create();

        $this->postJson("/api/media/{$media->id}/add-to-collection", [
            'user_id' => $user->id,
        ])->assertOk()->assertJsonPath('data.users.0.id', $user->id);

        $this->assertDatabaseHas('media_user', [
            'media_id' => $media->id,
            'user_id' => $user->id,
        ]);

        $this->deleteJson("/api/media/{$media->id}/remove-from-collection", [
            'user_id' => $user->id,
        ])->assertOk();

        $this->assertDatabaseMissing('media_user', [
            'media_id' => $media->id,
            'user_id' => $user->id,
        ]);
    }
}
