@extends('layout.adminMaster')

@section('title', 'Edit Venue')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold">Edit Venue</h1>

    @if ($errors->any())
        <div class="bg-red-200 text-red-800 p-4 rounded-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('venues.update', $venue->id) }}" method="POST" enctype="multipart/form-data" class="mt-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium">Name:</label>
            <input type="text" name="name" value="{{ old('name', $venue->name) }}" required class="w-full p-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label class="block font-medium">Price:</label>
            <input type="number" step="0.01" name="price" value="{{ old('price', $venue->price) }}" required class="w-full p-2 border rounded-lg">
        </div>

        <div class="mb-4">
            <label class="block font-medium">Image:</label>
            <input type="file" name="image" class="w-full p-2 border rounded-lg">
            @if ($venue->image)
                <img src="{{ $venue->image }}" class="mt-2 w-32 h-32 object-cover">
            @endif
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Update Venue</button>
    </form>
</div>
@endsection
