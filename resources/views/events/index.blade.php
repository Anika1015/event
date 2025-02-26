@extends('layout.master')

@section('title', 'Upcoming Events')

@section('content')
    <!-- Page Header -->
    <header class="text-center my-12">
        <h2 class="text-4xl font-bold text-gray-800">🎉 Events</h2>
    </header>

    <!-- Events Container -->
    <section class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 px-6">
        @foreach ($events as $event)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-all">
                <div class="bg-gray-800 text-white py-4 px-6">
                    <h3 class="text-2xl font-semibold">{{ $event->title }}</h3>
                    <!-- Optional: Event Date -->
                    @if($event->date)
                        <p class="mt-2 text-sm">{{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }}</p>
                    @endif
                </div>
                <div class="p-6">
                    <p class="text-gray-700">{{ Str::limit($event->description, 100) }}</p>
                    <div class="mt-4 flex justify-center">
                        <a href="{{ route('events.show', $event->id) }}" 
                           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg text-lg shadow-md transition-all" 
                           aria-label="Book {{ $event->title }} event">
                           Book
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection

