<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Venue;
use App\Models\DishPackage;
use App\Models\LightingTheme;

class EventController extends Controller
{
    
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return redirect()->route('booking.create', ['event_id' => $id])->with('event', $event);
    }

    public function create()
    {
        $venues = Venue::all();
        $dishPackages = DishPackage::all();
        $lightingThemes = LightingTheme::all();
        return view('events.create', compact('venues', 'dishPackages', 'lightingThemes'));
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'venues' => 'array',
        'dish_packages' => 'array',
        'lighting_themes' => 'array'
    ]);

    $event = Event::create([
        'title' => $request->title,
        'description' => $request->description
    ]);

    foreach ($request->venues as $venue) {
        Venue::create([
            'name' => $venue['name'],
            'price' => $venue['price'],
            'image' => $venue['image'] ?? null,
            'event_id' => $event->id
        ]);
    }

    foreach ($request->dish_packages as $dish) {
        DishPackage::create([
            'name' => $dish['name'],
            'price_per_guest' => $dish['price_per_guest'],
            'image' => $dish['image'] ?? null,
            'event_id' => $event->id
        ]);
    }

    foreach ($request->lighting_themes as $lighting) {
        LightingTheme::create([
            'name' => $lighting['name'],
            'price' => $lighting['price'],
            'image' => $lighting['image'] ?? null,
            'event_id' => $event->id
        ]);
    }

    return redirect()->route('events.manage')->with('success', 'Event created successfully.');
}


public function edit($id)
{
    $event = Event::with(['venues', 'dishPackages', 'lightingThemes'])->findOrFail($id);
    return view('events.edit', compact('event'));
}


public function update(Request $request, $id)
{
    $event = Event::findOrFail($id);

    
    $event->update($request->only(['name', 'description', 'date', 'location']));

    
    if ($request->has('venues')) {
        foreach ($request->venues as $venueData) {
            if (isset($venueData['id'])) {
               
                $venue = Venue::find($venueData['id']);
                $venue->update($venueData);
            } else {
                
                $event->venues()->create($venueData);
            }
        }
    }

    
    if ($request->has('dish_packages')) {
        foreach ($request->dish_packages as $dishData) {
            if (isset($dishData['id'])) {
                
                $dish = DishPackage::find($dishData['id']);
                $dish->update($dishData);
            } else {
               
                $event->dishPackages()->create($dishData);
            }
        }
    }

    
    if ($request->has('lighting_themes')) {
        foreach ($request->lighting_themes as $lightingData) {
            if (isset($lightingData['id'])) {
                
                $lighting = LightingTheme::find($lightingData['id']);
                $lighting->update($lightingData);
            } else {
                
                $event->lightingThemes()->create($lightingData);
            }
        }
    }

    return redirect()->route('events.edit', $event->id)->with('success', 'Event updated successfully.');
}
    
    public function destroy($id)
{
    $event = Event::findOrFail($id);

    $event->venues()->delete();
    $event->dishPackages()->delete();
    $event->lightingThemes()->delete();

    
    $event->delete();

    return redirect()->route('events.manage')->with('success', 'Event deleted successfully.');
}


public function manage()
{
    $events = Event::with(['venues', 'dishPackages', 'lightingThemes'])->get();
    return view('events.manage', compact('events'));
}

public function deleteVenue($id) {
    Venue::destroy($id);
    return response()->json(['success' => true]);
}

public function deleteDish($id) {
    DishPackage::destroy($id);
    return response()->json(['success' => true]);
}

public function deleteLighting($id) {
    LightingTheme::destroy($id);
    return response()->json(['success' => true]);
}


}


