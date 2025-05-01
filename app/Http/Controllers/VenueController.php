<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venue;

class VenueController extends Controller
{
    public function index()
    {
        $venues = Venue::all();
        return view('venues.index', compact('venues'));
    }

    public function create()
    {
        return view('venues.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('venues');
        }

        Venue::create($data);
        return redirect()->route('venues.index')->with('success', 'Venue added successfully.');
    }

    public function edit(Venue $venue)
    {
        return view('venues.edit', compact('venue'));
    }

    public function update(Request $request, Venue $venue)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('venues');
        }

        $venue->update($data);
        return redirect()->route('venues.index')->with('success', 'Venue updated successfully.');
    }

    public function destroy($id)
    {
        $venue = Venue::findOrFail($id);

        $venue->delete();
        
        return redirect()->route('events.manage', $venue->event_id)
                         ->with('success', 'Venue deleted successfully.');
    }
}
