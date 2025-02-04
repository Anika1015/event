@extends('layout.master')

@section('title', 'Event Details')

@section('content')
    <div class="event-details">
        <h1>{{ $event->title }}</h1>
        <p><strong>Date:</strong> {{ $event->date }}</p>
        <p><strong>Location:</strong> {{ $event->location }}</p>
        <p><strong>Description:</strong> {{ $event->description }}</p>
        <p><strong>Price:</strong> ${{ number_format($event->price, 2) }}</p>

        <a href="{{ route('payment.form', $event->id) }}" class="btn btn-primary">Get Tickets</a>
    </div>

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
