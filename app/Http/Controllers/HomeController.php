<?php

namespace App\Http\Controllers;
use App\Models\Models\Artist;
use App\Models\Models\Event;
use App\Models\Models\Genre;
use App\Models\Models\Venue;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $events = Event::orderBy('created_at', 'desc')->paginate(20);
        $artists = Artist::all();
        $genres = Genre::all();
        return view('home', compact('events', 'artists', 'genres'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $events = Event::where('title', 'like', '%' . $searchTerm . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $artists = Artist::all();
        $genres = Genre::all();
        return view('home', compact('events', 'artists', 'genres'));
    }

    public function filter(Request $request)
    {
        $artistId = $request->input('artist_id');
        $genreId = $request->input('genre_id');
        $date = $request->input('date');

        $events = Event::when($artistId, function ($query) use ($artistId) {
            $query->where('artist_id', $artistId);
        })
            ->when($genreId, function ($query) use ($genreId) {
                $query->where('genre_id', $genreId);
            })
            ->when($date, function ($query) use ($date) {
                $query->whereDate('date', $date);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $artists = Artist::all();
        $genres = Genre::all();
        return view('home', compact('events', 'artists', 'genres'));
    }
}
