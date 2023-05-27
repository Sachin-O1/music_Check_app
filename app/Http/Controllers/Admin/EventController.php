<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\Event;
use App\Models\Models\Venue;
use App\Models\Models\Artist;
use App\Models\Models\Genre;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.event.index', compact('events'));
    }

    public function create()
    {
        $genres = Genre::all();
        $artists = Artist::all();
        $venues = Venue::all();

        return view('admin.event.create', compact('genres', 'artists', 'venues'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'venue_id' => 'required|exists:venues,id',
            'artist_id' => 'required|exists:artists,id',
            'genre_id' => 'required|exists:genres,id',
        ]);

        Event::create($request->all());

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
    }

    public function edit(Event $event)
    {
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'venue_id' => 'required|exists:venues,id',
            'artist_id' => 'required|exists:artists,id',
            'genre_id' => 'required|exists:genres,id',
        ]);

        $event->update($request->all());

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }
}
