@extends('layout.Master')

@section('content')
<div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-3xl font-semibold text-green-600 mb-6">Payment Successful!</h2>
    <p class="text-gray-700 mb-4">Your booking has been successfully processed.</p>

    <div class="p-4 bg-gray-100 rounded-lg mb-4">
        <h3 class="text-lg font-medium mb-2">Booking Details</h3>
        <ul class="list-none">
            <li><strong>Venue:</strong> {{ $booking->venue ? $booking->venue->name : 'No venue selected' }}</li>
            <li><strong>Dish Package:</strong> {{ $booking->dishPackage ? $booking->dishPackage->name : 'No dish package selected' }}</li>
            <li><strong>Lighting & Theme:</strong> {{ $booking->lightingTheme ? $booking->lightingTheme->name : 'No lighting theme selected' }}</li>
        </ul>
    </div>

    <a href="{{ route('invoice.download', ['id' => $booking->BookingID]) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg inline-block mt-4">
    Download Invoice
</a>

    <a href="{{ route('dashboard') }}" class="text-blue-600 underline block mt-2">Return to Home</a>
</div>
@endsection








