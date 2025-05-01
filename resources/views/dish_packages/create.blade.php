@extends('layout.adminMaster')

@section('title', 'Add New Dish Package')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold">Add New Dish Package</h1>

    <form action="{{ route('dish-packages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Package Name</label>
            <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <div class="mb-4">
            <label for="price_per_guest" class="block text-sm font-medium text-gray-700">Price per Guest</label>
            <input type="number" name="price_per_guest" id="price_per_guest" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Image (Optional)</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-900 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Save</button>
    </form>
</div>
@endsection
