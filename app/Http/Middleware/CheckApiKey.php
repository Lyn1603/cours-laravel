<?php

namespace App\Http\Middleware;

use App\Models\ApiKey;
use App\Models\Playlist;
use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class CheckApiKey
{
    public function handle()
    {

        $apiKey = ApiKey::where('key', request()->header('x-api-key'))->first();

        $playlists = $apiKey->user->playlists()->get();


        return response()->json([

            'message' => $playlists->all()

            ]);
    }
}
