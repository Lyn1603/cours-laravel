<?php

use App\Http\Controllers\Api\PlaylistController;
use App\Http\Middleware\CheckApiKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(CheckApiKey::class)->get('/playlists', [PlaylistController::class, 'index']);






