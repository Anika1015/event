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

    public function store(Request $request) {
        $request->validate([
            'event_date' => 'required|date',
            //'location' => 'required|string|max:255',
            'time_slot' => 'required|in:afternoon,night',
            'number_of_guests' => 'required|integer|min:1',
            'venue_id' => 'required|exists:venues,id',
            'dish_package_id' => 'required|exists:dish_packages,id',
            'lighting_theme_id' => 'required|exists:lighting_themes,id',
            'description' => 'nullable|string|max:1000',
        ]);
    
        $existingBooking = Booking::where([
            'venue_id' => $request->venue_id,
            'event_date' => $request->event_date,
            'time_slot' => $request->time_slot,
            'status' => 'paid', 
        ])->exists();
    
        if ($existingBooking) {
            
            return redirect()->back()->with('error', 'This venue is already booked for the selected date and time slot.');
        }
    
        
        $venue = Venue::findOrFail($request->venue_id);
        $dishPackage = DishPackage::findOrFail($request->dish_package_id);
        $lightingTheme = LightingTheme::findOrFail($request->lighting_theme_id);
    
        
        $totalPrice = $venue->price + ($dishPackage->price_per_guest * $request->number_of_guests) + $lightingTheme->price;
    
        
        Booking::create([
            'UserID' => Auth::id(),
            'event_date' => $request->event_date,
           // 'location' => $request->location,
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
    
        return redirect()->route('booking.index')
            ->with('success', 'Booking request submitted successfully.');
    }
    


}

