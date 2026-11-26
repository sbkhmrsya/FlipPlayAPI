<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'judul' => $this->judul,
            'jenis' => $this->jenis,
            'genre' => $this->genre,
            'deskripsi' => $this->deskripsi,
            'episodes' => $this->episodes,
            'score' => $this->score,
            'country' => $this->country,
            'chapters' => $this->chapters,
            'volumes' => $this->volumes,
            'is_available' => $this->is_available,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'users' => $this->whenLoaded('users', function () {
                return $this->users->map(function (User $user) {
                    return [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'added_at' => $user->pivot->created_at,
                    ];
                });
            }),
        ];
    }
}
