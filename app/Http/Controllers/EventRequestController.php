<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventRequest;
use Illuminate\Support\Facades\Auth;


class EventRequestController extends Controller
{
    public function create()
    {
        return view('events.request');
    }

    public function store(Request $request)
{
    $request->validate([
        'event_title' => 'required',
        'event_description' => 'required',
        'event_date' => 'required|date',
        'location' => 'required',
    ]);

    EventRequest::create([
        'event_title' => $request->event_title,
        'event_description' => $request->event_description,
        'event_date' => $request->event_date,
        'location' => $request->location,
        'status' => 'pending', // Default status
        'user_id' => Auth::id(), // Assign to logged-in user
    ]);

    return redirect()->route('dashboard')->with('success', 'Your event request has been submitted for review.');
}

}

