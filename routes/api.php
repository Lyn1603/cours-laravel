<?php

use App\Http\Controllers\ApiKeyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::name('apikey.')->prefix('apikey')->controller(ApiKeyController::class)->group(function() {
    Route::get('/playlists', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::delete('/{apikey}', 'destroy')->name('destroy');
});
