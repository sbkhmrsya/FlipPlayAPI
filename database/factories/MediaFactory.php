<?php

namespace Database\Factories;

use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => fake()->unique()->sentence(3),
            'jenis' => fake()->randomElement(['Anime', 'Drama', 'Manga', 'Light Novel']),
            'genre' => fake()->words(2, true),
            'deskripsi' => fake()->sentence(),
            'episodes' => null,
            'score' => null,
            'country' => null,
            'chapters' => null,
            'volumes' => null,
            'is_available' => true,
        ];
    }
}
