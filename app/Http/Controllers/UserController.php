<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Media;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // GET /api/users/{user}/collection
    public function collection(User $user)
    {
        return new UserResource($user->load('media'));
    }

    // POST /api/users/{user}/collection
    public function addToCollection(Request $request, User $user)
    {
        $request->validate(['media_id' => 'required|exists:media,id']);

        $media = Media::findOrFail($request->media_id);

        if (! $media->is_available) {
            return response()->json(['message' => "'{$media->judul}' tidak tersedia."], 422);
        }
        if ($user->media()->where('media_id', $media->id)->exists()) {
            return response()->json(['message' => 'Media sudah ada di koleksi'], 409);
        }

        $user->media()->attach($media->id);
        return response()->json(['message' => 'Media berhasil ditambahkan ke koleksi'], 201);
    }

    // DELETE /api/users/{user}/collection/{media}
    public function removeFromCollection(User $user, Media $media)
    {
        $user->media()->detach($media->id);
        return response()->json(['message' => 'Media berhasil dihapus dari koleksi']);
    }
}
