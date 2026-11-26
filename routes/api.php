<?php

use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Route;

Route::apiResource('media', MediaController::class)->parameters([
    'media' => 'media',
]);

Route::post('/media/{media}/add-to-collection', [MediaController::class, 'addToCollection']);
Route::delete('/media/{media}/remove-from-collection', [MediaController::class, 'removeFromCollection']);
Route::get('/users/{user}/collection', [MediaController::class, 'userCollection']);
