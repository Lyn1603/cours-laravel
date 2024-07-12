<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ApiKey;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ApiKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $api = $user->apiKeys();

        return Inertia::render('ApiKey/Index' , [
            'apikey' => $api
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ApiKey $apiKey)
    {
        return Inertia::render('ApiKey/Create', [
            'apikeys' => $apiKey,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données entrantes
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
        ]);

        // Trouver l'utilisateur
        $user = User::find($request->user_id);

        if ($user) {
            // Création de la clé API
            $apiKey = $user->apiKeys()->create([
                'name' => $request->name,
            ]);

            return response()->json([
                'message' => 'API key created successfully',
                'api_key' => $apiKey->key,
            ], 201);
        } else {
            // Gérer le cas où l'utilisateur n'est pas trouvé
            return response()->json(['error' => 'User not found'], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
