<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use App\Http\Resources\MediaResource;
use App\Models\Media;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class MediaController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $filters = $request->validate([
            'search' => ['sometimes', 'string', 'max:255'],
            'jenis' => ['sometimes', 'string', 'max:100'],
            'is_available' => ['sometimes', 'boolean'],
        ]);
        $query = Media::query();

        if (! empty($filters['search'])) {
            $query->where('judul', 'like', '%'.$filters['search'].'%');
        }

        if (! empty($filters['jenis'])) {
            $query->where('jenis', $filters['jenis']);
        }

        if (array_key_exists('is_available', $filters)) {
            $query->where('is_available', $filters['is_available']);
        }

        return MediaResource::collection($query->get());
    }

    public function store(StoreMediaRequest $request): JsonResponse
    {
        $media = Media::create($request->validated());

        return (new MediaResource($media))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Media $media): MediaResource
    {
        $media->load('users');

        return new MediaResource($media);
    }

    public function update(UpdateMediaRequest $request, Media $media): MediaResource
    {
        $media->update($request->validated());

        return new MediaResource($media);
    }

    public function destroy(Media $media): Response
    {
        $media->delete();

        return response()->noContent();
    }

    public function addToCollection(Request $request, Media $media): MediaResource|JsonResponse
    {
        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
        ]);
        $user = User::findOrFail($validated['user_id']);

        if (! $media->is_available) {
            return response()->json([
                'message' => 'Media tidak tersedia di library.',
            ], Response::HTTP_CONFLICT);
        }

        if ($user->media()->whereKey($media->getKey())->exists()) {
            return response()->json([
                'message' => 'Media sudah ada dalam koleksi pengguna ini.',
            ], Response::HTTP_BAD_REQUEST);
        }

        $user->media()->attach($media->id);
        $media->load('users');

        return new MediaResource($media);
    }

    public function removeFromCollection(Request $request, Media $media): JsonResponse
    {
        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
        ]);
        $user = User::findOrFail($validated['user_id']);

        if (! $user->media()->whereKey($media->getKey())->exists()) {
            return response()->json([
                'message' => 'Media tidak ditemukan dalam koleksi pengguna ini.',
            ], Response::HTTP_NOT_FOUND);
        }

        $user->media()->detach($media->id);

        return response()->json([
            'message' => 'Media berhasil dihapus dari koleksi pengguna.',
        ]);
    }

    public function userCollection(User $user): AnonymousResourceCollection
    {
        return MediaResource::collection($user->media);
    }
}
