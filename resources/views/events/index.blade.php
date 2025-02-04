@extends('layout.master')

@section('title', 'Upcoming Events')

@section('content')
    <header class="page-header">
        <h2>Upcoming Events</h2>
    </header>

    <section class="events-container">
        @foreach ($events as $event)
            <div class="event-card">
                <h3 class="event-title">{{ $event->title }}</h3>
                <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</p>
                <p><strong>Location:</strong> {{ $event->location }}</p>
                <p><strong>Description:</strong> {{ Str::limit($event->description, 100) }}</p>
                <a href="{{ route('events.show', $event->id) }}" class="btn-get-tickets">Get</a>


            </div>
        @endforeach
    </section>
@endsection
