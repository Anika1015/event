<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class BookingController extends Controller {
    public function create(Request $request, $event_id = null) {
        return view('book', ['event_id' => $event_id]);
    }

    public function status()
{
    
        $booking = auth()->user()->bookings()->latest()->first();

        // Check if a booking exists
        if (!$booking) {
            // If no booking exists, return a message saying so
            return view('status', ['message' => 'You have no bookings.']);
        }

        // If a booking exists, pass the booking status to the view
        return view('status', ['booking' => $booking]);

}




    

   


    

public function index() {
    $bookings = Booking::where('user_id', auth()->id())->get();
    
    return view('admin.index', compact('bookings'));
}

    

    public function store(Request $request, $event_id) {
        $request->validate([
            
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
            'time_slot' => 'required|in:afternoon,night',
            'number_of_guests' => 'required|integer|min:1',
            'description' => 'nullable|string|max:1000',
        ]);
    
        
        

        Booking::create([
            'UserID' => Auth::id(),
            'EventID' => $event_id, // Get the event ID directly from the URL
            'event_date' => $request->event_date,
            'location' => $request->location,
            'time_slot' => $request->time_slot,
            'number_of_guests' => $request->number_of_guests,
            'description' => $request->description, 
            'status' => 'pending',
            'admin_decision' => 'pending'
        ]);
        

        return redirect()->route('booking.create', ['event_id' => $event_id])
        ->with('success', 'Booking request submitted.');


    
    }


    

    



}

