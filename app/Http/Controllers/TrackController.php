<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tracks = Track::where('display', true)->orderBy('artist')->get();
        return Inertia::render('Track/Index', [
            'tracks' => $tracks,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Track/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'title' => ['required', 'string', 'min : 5 ', 'max : 255'],
            'artist' => ['required', 'string', 'min : 5 ', 'max : 255'],
            'display' => ['required', 'boolean'],
            'image' => ['required', 'image', 'max:1000'],
            'music' => ['required', 'file', 'mimes:mov,mp3,wav', ' max: 10000'],


        ]);

        $uuid = 'trk'.Str::uuid();

        $imageExtension = $request->image->extension();
        $imagepath =      $request->image->storAs('tracks/images', $uuid . '.' . $imageExtension);

        $musicExtension = $request->image->extension();
        $musicpath =      $request->image->storAs('tracks/musics', $uuid . '.' . $musicExtension);

        Track::create([
            'title' => $request->title,
            'artist' => $request->artist,
            'display' => $request->display,
            'image' => $imagepath,
            'music' => $musicpath

        ]);

        return redirect()->route('tracks.index');
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
    public function edit(Track $track)
    {
        return Inertia::render('Track/Edit', [
            'track' => $track
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Track $track)
    {

        $request->validate([
            'title' => ['required', 'string', 'min : 5 ', 'max : 255'],
            'artist' => ['required', 'string', 'min : 5 ', 'max : 255'],
            'display' => ['required', 'boolean'],


        ]);

        $track->title = $request->title;
        $track->artist = $request->artist;
        $track->display= $request->title;
        $track->image = $request->title;
        $track->audio = $request->title;
        $track->save();

        return redirect()->route('tracks.index');




    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track)
    {
        $track->delete();

        return Inertia::render('Track/Index');
    }
}
