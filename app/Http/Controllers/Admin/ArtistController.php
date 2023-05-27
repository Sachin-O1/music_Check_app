<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\Artist;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::all();
        return view('admin.artist.index', compact('artists'));
    }

    public function create()
    {
        return view('admin.artist.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:artists|max:255',
        ]);

        Artist::create($request->all());

        return redirect()->route('admin.artists.index')->with('success', 'Artist created successfully.');
    }

    public function edit(Artist $artist)
    {
        return view('admin.artist.edit', compact('artist'));
    }

    public function update(Request $request, Artist $artist)
    {
        $request->validate([
            'name' => 'required|unique:artists,name,' . $artist->id . '|max:255',
        ]);

        $artist->update($request->all());

        return redirect()->route('admin.artists.index')->with('success', 'Artist updated successfully.');
    }

    public function destroy(Artist $artist)
    {
        $artist->delete();

        return redirect()->route('admin.artists.index')->with('success', 'Artist deleted successfully.');
    }
}
