@extends('layout.adminMaster')

@section('title', 'Events Management')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 bg-white shadow-xl rounded-lg overflow-hidden">
        <!-- Header Section -->
        <div class="bg-gray-800 text-white py-6 px-8">
            <h1 class="text-3xl font-bold">Manage Events</h1>
        </div>

        <!-- Create Event Form -->
        <div class="p-8">
            <form action="{{ route('events.store') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="title" class="text-lg font-semibold text-gray-700">Title</label>
                    <input type="text" name="title" class="form-control mt-2 p-3 w-full border rounded-lg" required/>
                    @error('title')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="price" class="text-lg font-semibold text-gray-700">Price</label>
                    <input type="number" step="0.01" name="price" class="form-control mt-2 p-3 w-full border rounded-lg" required/>
                    @error('price')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                

                <div class="mb-6">
                    <label for="description" class="text-lg font-semibold text-gray-700">Description</label>
                    <textarea name="description" class="form-control mt-2 p-3 w-full border rounded-lg" rows="3" required></textarea>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6 flex justify-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-lg text-lg shadow-md transition-all">Save Event</button>
                </div>
            </form>
        </div>
    </div>

    <!-- All Events List Section -->
    <div class="max-w-4xl mx-auto mt-8 bg-white shadow-xl rounded-lg overflow-hidden">
        <div class="bg-gray-800 text-white py-6 px-8">
            <h4 class="text-2xl font-bold">All Events</h4>
        </div>
        <div class="p-8">
            <ul class="space-y-6">
                @foreach($events as $event)
                    <li class="bg-gray-50 p-6 rounded-lg shadow-lg">
                        <!-- Update Form -->
                        <form action="{{ route('events.update', $event->id) }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="title" class="text-lg font-semibold text-gray-700">Title</label>
                                <input type="text" name="title" class="form-control mt-2 p-3 w-full border rounded-lg" value="{{ $event->title }}" required/>
                            </div>

                            <div class="mb-4">
                                <label for="price" class="text-lg font-semibold text-gray-700">Price</label>
                                <input type="number" step="0.01" name="price" class="form-control mt-2 p-3 w-full border rounded-lg" value="{{ $event->price }}" required/>
                            </div>

                            

                            <div class="mb-4">
                                <label for="description" class="text-lg font-semibold text-gray-700">Description</label>
                                <textarea name="description" class="form-control mt-2 p-3 w-full border rounded-lg" rows="3" required>{{ $event->description }}</textarea>
                            </div>

                            <div class="flex justify-start space-x-4 mb-6">
                                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white py-3 px-6 rounded-lg text-lg shadow-md transition-all">Update</button>
                            
                        </form>

                        <!-- Delete Form (Separate from Update) -->
                        <form action="{{ route('events.delete', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?')">
                            @csrf
                            <input type="hidden" name="_method" value="POST">
                           
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white py-3 px-6 rounded-lg text-lg shadow-md transition-all">
                                    Delete
                                </button>
                            </div>
                        </form>

                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection


