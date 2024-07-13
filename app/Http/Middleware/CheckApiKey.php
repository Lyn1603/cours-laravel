<?php

namespace App\Http\Middleware;

use App\Models\ApiKey;


class CheckApiKey
{
    public function handle()
    {

        $apiKey = ApiKey::where('key', request()->header('x-api-key'))->firstOrFail();

        $playlists = $apiKey->user->playlists()->get();

        return response()->json([

            'message' => $playlists->all()

            ]);

    }
}
