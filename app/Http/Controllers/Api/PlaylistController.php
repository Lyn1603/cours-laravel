<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PlaylistController extends Controller
{
    public function index(Request $request)
    {

        Log::info('Fetching playlists');

        $user = $request->attributes->get('user');

        Log::info('User: ' . ($user ? $user->id : 'none'));

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $playlists = $user->playlists()->withCount(['tracks'])->get();

        return response()->json($playlists);
    }
}


