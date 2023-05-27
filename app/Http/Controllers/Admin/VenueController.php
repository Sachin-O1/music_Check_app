<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\Venue;

class VenueController extends Controller
{
    public function index()
    {
        $venues = Venue::all();
        return view('admin.venue.index', compact('venues'));
    }

    public function create()
    {
        return view('admin.venue.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:venues|max:255',
            'address' => 'required|max:255',
            'contact_number' => 'required|numeric',
        ]);

        Venue::create($request->all());

        return redirect()->route('admin.venues.index')->with('success', 'Venue created successfully.');
    }

    public function edit(Venue $venue)
    {
        return view('admin.venue.edit', compact('venue'));
    }

    public function update(Request $request, Venue $venue)
    {
        $request->validate([
            'name' => 'required|unique:venues,name,' . $venue->id . '|max:255',
            'address' => 'required|max:255',
            'contact_number' => 'required|numeric',
        ]);

        $venue->update($request->all());

        return redirect()->route('admin.venues.index')->with('success', 'Venue updated successfully.');
    }

    public function destroy(Venue $venue)
    {
        $venue->delete();

        return redirect()->route('admin.venues.index')->with('success', 'Venue deleted successfully.');
    }
}
