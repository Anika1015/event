@extends('layout.Master')

@section('content')
<div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Event Booking</h2>
    
    <form method="POST" action="{{ route('booking.store', ['event_id' => $event_id]) }}">
        @csrf
       



        <div class="mb-4">
            <label for="event_date" class="block text-gray-700 text-sm font-medium">Event Date</label>
            <input type="date" name="event_date" id="event_date" class="w-full mt-1 p-3 border border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="location" class="block text-gray-700 text-sm font-medium">Location</label>
            <input type="text" name="location" id="location" class="w-full mt-1 p-3 border border-gray-300 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="time_slot" class="block text-gray-700 text-sm font-medium">Time Slot</label>
            <select name="time_slot" id="time_slot" class="w-full mt-1 p-3 border border-gray-300 rounded-lg" required>
                <option value="afternoon">Afternoon</option>
                <option value="night">Night</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="number_of_guests" class="block text-gray-700 text-sm font-medium">Number of Guests</label>
            <input type="number" name="number_of_guests" id="number_of_guests" class="w-full mt-1 p-3 border border-gray-300 rounded-lg" min="1" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-medium">Description</label>
            <textarea name="description" id="description" class="w-full mt-1 p-3 border border-gray-300 rounded-lg" rows="4" placeholder="Provide additional details" required></textarea>
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-lg text-lg transition-all mt-4">Submit Booking</button>
    </form>
</div>
@endsection
