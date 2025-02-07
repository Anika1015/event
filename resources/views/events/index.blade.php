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
    <style>
        .event-details {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background: #fff;
        }
        .btn {
            display: inline-block;
            padding: 10px 15px;
            margin-top: 10px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
@endsection
