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
}


