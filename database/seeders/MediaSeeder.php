<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        Media::query()->upsert([
            [
                'judul' => 'Sousou no Frieren',
                'jenis' => 'Anime',
                'genre' => 'Adventure, Drama, Fantasy',
                'deskripsi' => 'Anime petualangan dengan 28 episode.',
                'episodes' => 28,
                'score' => 9.24,
                'country' => null,
                'chapters' => null,
                'volumes' => null,
                'is_available' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'judul' => 'Jujutsu Kaisen',
                'jenis' => 'Anime',
                'genre' => 'Action, Supernatural',
                'deskripsi' => 'Anime aksi dengan 24 episode.',
                'episodes' => 24,
                'score' => 8.55,
                'country' => null,
                'chapters' => null,
                'volumes' => null,
                'is_available' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'judul' => 'Lovely Runner',
                'jenis' => 'Drama',
                'genre' => 'Romance, Fantasy',
                'deskripsi' => 'Drama Korea dengan 16 episode.',
                'episodes' => 16,
                'score' => null,
                'country' => 'Korea Selatan',
                'chapters' => null,
                'volumes' => null,
                'is_available' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'judul' => 'One Piece',
                'jenis' => 'Manga',
                'genre' => 'Adventure, Fantasy',
                'deskripsi' => null,
                'episodes' => null,
                'score' => null,
                'country' => null,
                'chapters' => 1120,
                'volumes' => null,
                'is_available' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'judul' => 'Suzumiya Haruhi',
                'jenis' => 'Light Novel',
                'genre' => 'Comedy, Sci-Fi',
                'deskripsi' => null,
                'episodes' => null,
                'score' => null,
                'country' => null,
                'chapters' => 95,
                'volumes' => 12,
                'is_available' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ], ['judul'], [
            'jenis',
            'genre',
            'deskripsi',
            'episodes',
            'score',
            'country',
            'chapters',
            'volumes',
            'is_available',
            'updated_at',
        ]);
    }
}
