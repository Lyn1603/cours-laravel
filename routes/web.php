<?php

use App\Http\Controllers\ApiKeyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\TrackController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/' , [TrackController::class, 'index'])->name('tracks.index');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::name('playlists.')->prefix('playlists')->controller(PlaylistController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/{playlist}', 'show')->name('show');
        Route::post('/', 'store')->name('store');
        Route::get('/{playlist}/edit', 'edit')->name('edit');
        Route::put('/{playlist}', 'update')->name('update');
        Route::delete('/{playlist}', 'destroy')->name('destroy');
    });


    //Route::get('test', [HomeController::class, 'test']);
    Route::name('tracks.')->prefix('tracks')->controller(TrackController::class)->middleware([IsAdmin::class])->group(function() {
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{track}', 'show')->name('show');
        Route::get('/{track}/edit', 'edit')->name('edit');
        Route::put('/{track}', 'update')->name('update');
        Route::delete('/{track}', 'destroy')->name('destroy');
    });



    Route::name('apikey.')->prefix('apikey')->controller(ApiKeyController::class)->group(function() {

        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::delete('/{apikey}', 'destroy')->name('destroy');
    });




});



//Route::resource('tracks', TrackController::class)->except('edit');




