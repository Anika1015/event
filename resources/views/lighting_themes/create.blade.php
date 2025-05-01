@extends('layout.adminMaster')

@section('title', 'Create Lighting Theme')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold">Create Lighting Theme</h1>

    <form action="{{ route('lighting-themes.store') }}" method="POST" enctype="multipart/form-data" class="mt-6">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" id="name" name="name" class="form-input mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700">Price</label>
            <input type="number" id="price" name="price" class="form-input mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700">Image</label>
            <input type="file" id="image" name="image" class="form-input mt-1 block w-full">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Create Lighting Theme</button>
    </form>
</div>
@endsection
