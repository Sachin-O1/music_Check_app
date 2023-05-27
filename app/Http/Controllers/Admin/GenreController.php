<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('admin.genre.index', compact('genres'));
    }

    public function create()
    {
        return view('admin.genre.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:genres|max:255',
        ]);

        Genre::create($request->all());

        return redirect()->route('admin.genres.index')->with('success', 'Genre created successfully.');
    }

    public function edit(Genre $genre)
    {
        return view('admin.genre.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'name' => 'required|unique:genres,name,' . $genre->id . '|max:255',
        ]);

        $genre->update($request->all());

        return redirect()->route('admin.genres.index')->with('success', 'Genre updated successfully.');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();

        return redirect()->route('admin.genres.index')->with('success', 'Genre deleted successfully.');
    }
}
