@extends('layout.master')

@section('title', 'Event Details')

@section('content')
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden mt-10">
        <div class="bg-gray-800 text-white py-6 px-8">
            <h1 class="text-3xl font-bold">{{ $event->title }}</h1>
            
        </div>
        <div class="p-8">
            <p class="text-lg text-gray-700"><strong>Description:</strong> {{ $event->description }}</p>
            <p class="text-lg text-gray-700 mt-4"><strong>Price:</strong> <span class="text-green-600 font-semibold">{{ number_format($event->price, 2) }} Taka</span></p>

            <div class="mt-6 flex justify-center">
            <a href="{{ route('booking.create', ['event_id' => $event->id]) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg text-lg shadow-lg transition-all">Book Now</a>
            </div>
        </div>
    </div>
@endsection

