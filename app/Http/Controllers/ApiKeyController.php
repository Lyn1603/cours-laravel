<?php

// app/Http/Controllers/ApiKeyController.php

namespace App\Http\Controllers;

use App\Models\ApiKey;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;
use function Webmozart\Assert\Tests\StaticAnalysis\uuid;

class ApiKeyController extends Controller
{
    public function index()
    {

        $user = auth()->user();
        $apiKeys = $user->apikey;

        return Inertia::render('ApiKey/Index', [
            'apikeys' => $apiKeys
        ]);
    }

    public function create()
    {
        return Inertia::render('ApiKey/Create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required' , 'string', 'max:255'],

        ]);


        // Crée une nouvelle clé API pour l'utilisateur
        $apiKey = ApiKey::create([
            'uuid' => 'key-' .Str::uuid(),
            'user_id' => $request->user()->id,
            'name' => $request->name
        ]);

        response()->json($apiKey, 201);

        return redirect()->route('apikey.index');



    }

    public function destroy($apiKey)
    {
        $user = auth()->user();
        $api = $user->apikey;

        foreach ($api as $key) {

            if($key['uuid'] == $apiKey) {
                $key->delete();
            }
        }

        return redirect()->route('apikey.index');

    }
}
