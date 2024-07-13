<?php

// app/Http/Controllers/Api/PlaylistController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
public function index(Request $request)
{
// Récupère l'utilisateur authentifié
$user = Auth::user();

// Vérifie si l'utilisateur est authentifié
if (!$user) {
return response()->json(['error' => 'Unauthorized'], 401);
}

// Charge les playlists de l'utilisateur avec le compte des pistes
$playlists = $user->playlists()->withCount('tracks')->get();

// Retourne les playlists au format JSON
return response()->json($playlists);
}
}
