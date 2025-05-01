<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Event;
use App\Models\Venue;
use App\Models\DishPackage;
use App\Models\LightingTheme;



class BookingController extends Controller {

    public function create(Request $request, $event_id = null)
{
    
    $venues = Venue::where('event_id', $event_id)->get();
    $dishPackages = DishPackage::where('event_id', $event_id)->get();
    $lightingThemes = LightingTheme::where('event_id', $event_id)->get();
    
    $event = Event::find($event_id);

    return view('book', compact('event_id', 'venues', 'dishPackages', 'lightingThemes', 'event'));
}



    public function status()
    {
        
            $booking = auth()->user()->bookings()->latest()->first();
    
           
            if (!$booking) {
                
                return view('status', ['message' => 'You have no bookings.']);
            }

            return view('status', ['booking' => $booking]);
    
    }




    

   


    

public function index() {
    
    $bookings = Booking::where('user_id', auth()->id())->get();
    
    return view('admin.index', compact('bookings'));
}
    
public function store(Request $request, $event_id) {
    $request->validate([
        'event_date' => 'required|date',
        'time_slot' => 'required|in:afternoon,night',
        'number_of_guests' => 'required|integer|min:1',
        'venue_id' => 'required|integer',
        'dish_package_id' => 'required|integer',
        'lighting_theme_id' => 'required|integer',
        'description' => 'nullable|string|max:1000',
    ]);

    $existingBooking = Booking::where('event_date', $request->event_date)
        ->where('venue_id', $request->venue_id)
        ->where('time_slot', $request->time_slot)
        ->first();

    if ($existingBooking) {
        
            
        return redirect()->route('dashboard')->with('error', 'Booking request rejected due to a conflict with an existing booking.');
    } else {
        $venue = Venue::find($request->venue_id);
        $dishPackage = DishPackage::find($request->dish_package_id);
        $lightingTheme = LightingTheme::find($request->lighting_theme_id);

        $totalPrice = $venue->price + ($dishPackage->price_per_guest * $request->number_of_guests) + $lightingTheme->price;

        Booking::create([
            'UserID' => Auth::id(),
            'EventID' => $event_id,
            'event_date' => $request->event_date,
            'time_slot' => $request->time_slot,
            'number_of_guests' => $request->number_of_guests,
            'venue_id' => $venue->id,
            'dish_package_id' => $dishPackage->id,
            'lighting_theme_id' => $lightingTheme->id,
            'description' => $request->description,
            'status' => 'pending',
            'admin_decision' => 'pending',
            'amount' => $totalPrice
        ]);

        return redirect()->route('booking.create', ['event_id' => $event_id])
            ->with('success', 'Booking request submitted.');
    }
}



}

