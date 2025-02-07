@extends('layout.master')

@section('title', 'Edit Events')
@section('content')
    <h1>Edit Event</h1>
    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $event->title }}" required>
        <input type="number" step="0.01" name="price" value="{{ $event->price }}" required>
        <input type="date" name="date" value="{{ $event->date }}" required>
        <input type="text" name="location" value="{{ $event->location }}" required>
        <textarea name="description" required>{{ $event->description }}</textarea>
        <button type="submit">Update</button>
    </form>
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