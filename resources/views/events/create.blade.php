@extends('layout.master')

@section('title', 'Create Events')

@section('content')
    <h1>Create Event</h1>
    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Event Title" required>
        <input type="number" step="0.01" name="price" placeholder="Price" required>
        <input type="date" name="date" required>
        <input type="text" name="location" placeholder="Location" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <button type="submit">Create</button>
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