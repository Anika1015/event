@extends('layout.adminMaster')

@section('title', 'Edit Dish Package')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold">Edit Dish Package</h1>

    <form action="{{ route('dish-packages.update', $dishPackage->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Package Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $dishPackage->name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <div class="mb-4">
            <label for="price_per_guest" class="block text-sm font-medium text-gray-700">Price per Guest</label>
            <input type="number" name="price_per_guest" id="price_per_guest" value="{{ old('price_per_guest', $dishPackage->price_per_guest) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Image (Optional)</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-900 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            @if($dishPackage->image)
                <img src="{{ Storage::url($dishPackage->image) }}" width="100" alt="Current Image">
            @endif
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Save Changes</button>
    </form>
</div>
@endsection
