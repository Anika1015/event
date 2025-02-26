<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Event;

class AdminBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['event', 'user'])->get();
        return view('admin.index', compact('bookings'));
    }

    public function accept($id)
{
    $booking = Booking::findOrFail($id);
    $booking->status = 'accepted';
    $booking->save();

    return redirect()->route('admin.index')->with('success', 'Booking request accepted.');
}

public function reject($id)
{
    $booking = Booking::findOrFail($id);
    $booking->status = 'rejected';
    $booking->save();

    return redirect()->route('admin.index')->with('error', 'Booking request rejected.');
}





}


