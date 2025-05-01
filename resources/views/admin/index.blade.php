@extends('layout.adminMaster')

@section('content')
<div class="container mx-auto my-8 px-6">
    <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">Booking Requests</h2>

    <!-- Success & Error Messages -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
            {{ session('error') }}
        </div>
    @endif

    <!-- Booking Table -->
    <div class="bg-white shadow-lg rounded-lg">
        <table class="w-full border-collapse border border-gray-200">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-6 border border-gray-300 text-left">User</th>
                    <th class="py-3 px-6 border border-gray-300 text-left">Event</th>
                    <th class="py-3 px-6 border border-gray-300 text-left">Event Date</th>
                    <th class="py-3 px-6 border border-gray-300 text-left">Location</th>
                    <th class="py-3 px-6 border border-gray-300 text-left">Time Slot</th>
                    <th class="py-3 px-6 border border-gray-300 text-left">Guests</th>
                    <th class="py-3 px-6 border border-gray-300 text-center">Status</th>
                    <th class="py-3 px-6 border border-gray-300 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-4 px-6 border border-gray-300">{{ $booking->user->name }}</td>
                        <td class="py-4 px-6 border border-gray-300">{{ $booking->event->title }}</td>
                        <td class="py-4 px-6 border border-gray-300">{{ $booking->event_date }}</td>
                        <td class="py-4 px-6 border border-gray-300">{{ $booking->location }}</td>
                        <td class="py-4 px-6 border border-gray-300">{{ $booking->time_slot }}</td>
                        <td class="py-4 px-6 border border-gray-300">{{ $booking->number_of_guests }}</td>
                        
                        <!-- Booking Status -->
                        <td class="py-4 px-6 border border-gray-300 text-center">
                            @if($booking->status == 'pending')
                                <span class="bg-yellow-500 text-white text-sm font-semibold px-4 py-2 rounded-lg">Pending</span>
                            @elseif($booking->status == 'accepted')
                                <span class="bg-blue-500 text-white text-sm font-semibold px-4 py-2 rounded-lg">Accepted</span>
                            @elseif($booking->status == 'confirmed')
                                <span class="bg-green-500 text-white text-sm font-semibold px-4 py-2 rounded-lg">Confirmed</span>
                            @elseif($booking->status == 'paid')
                                <span class="bg-green-500 text-white text-sm font-semibold px-4 py-2 rounded-lg">Paid</span>    
                            @else
                                <span class="bg-red-500 text-white text-sm font-semibold px-4 py-2 rounded-lg">Rejected</span>
                            @endif
                        </td>

                        <!-- Action Buttons -->
                        <td class="py-4 px-6 border border-gray-300 text-center">
                            @if($booking->status == 'pending')
                                <div class="flex justify-center space-x-2">
                                    <form action="{{ route('admin.booking.accept', ['id' => $booking->BookingID]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400">
                                            <i class="fas fa-check-circle"></i> Accept
                                        </button>
                                    </form>

                                    <form action="{{ route('admin.booking.reject', ['id' => $booking->BookingID]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400">
                                            <i class="fas fa-times-circle"></i> Reject
                                        </button>
                                    </form>
                                </div>
                            @else
                                <span class="text-gray-500 text-sm">No action available</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection



