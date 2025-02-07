<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    // Show all events
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    // Show a single event
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    // Show form to create an event
    public function create()
    {
        return view('events.create');
    }

    // Store a new event
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'date' => 'required|date',
            'location' => 'required',
            'description' => 'required',
        ]);

        Event::create($request->all());
        return redirect()->route('events.manage')->with('success', 'Event created successfully.');
    }

    // Show form to edit an event
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    // Update an event
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'date' => 'required|date',
            'location' => 'required',
            'description' => 'required',
        ]);

        $event = Event::findOrFail($id);
        $event->update($request->all());
        return redirect()->route('events.manage')->with('success', 'Event updated successfully.');
    }

    // Delete an event
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('events.manage')->with('success', 'Event deleted successfully.');
    }
    public function manage()
    {
        $events = Event::all();
        return view('events.manage', compact('events'));
    }

}


