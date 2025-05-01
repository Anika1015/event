@extends('layout.adminMaster')

@section('content')
<div class="max-w-7xl mx-auto my-10 px-6">
    <h2 class="text-4xl font-extrabold text-center text-gray-900 mb-8">Manage Events</h2>

    <!-- Create New Event Button -->
    <div class="mb-6 text-right">
        <a href="{{ route('events.create') }}" class="bg-gradient-to-r from-blue-700 to-teal-500 text-white px-6 py-3 rounded-full text-lg hover:bg-gradient-to-l focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300">
            Create New Event
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-8 shadow-md">
            <p class="font-medium">{{ session('success') }}</p>
        </div>
    @endif

    <!-- Events Table -->
    <div class="overflow-hidden bg-white shadow-lg rounded-xl">
        <table class="min-w-full table-auto border-collapse text-gray-700">
            <thead class="bg-blue-800 text-white">
                <tr>
                    <th class="py-4 px-6 text-left text-lg font-semibold border-b border-gray-200">Event Title</th>
                    <th class="py-4 px-6 text-left text-lg font-semibold border-b border-gray-200">Description</th>
                    <th class="py-4 px-6 text-left text-lg font-semibold border-b border-gray-200">Venues</th>
                    <th class="py-4 px-6 text-left text-lg font-semibold border-b border-gray-200">Dish Packages</th>
                    <th class="py-4 px-6 text-left text-lg font-semibold border-b border-gray-200">Lighting Themes</th>
                    <th class="py-4 px-6 text-center text-lg font-semibold border-b border-gray-200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-4 px-6 border-t border-gray-200">{{ $event->title }}</td>
                        <td class="py-4 px-6 border-t border-gray-200">{{ $event->description }}</td>
                        <td class="py-4 px-6 border-t border-gray-200 space-y-1">
                            @foreach($event->venues as $venue)
                                <div class="text-sm">{{ $venue->name }} - ${{ number_format($venue->price, 2) }}</div>
                            @endforeach
                        </td>
                        <td class="py-4 px-6 border-t border-gray-200 space-y-1">
                            @foreach($event->dishPackages as $dish)
                                <div class="text-sm">{{ $dish->name }} - ${{ number_format($dish->price_per_guest, 2) }}</div>
                            @endforeach
                        </td>
                        <td class="py-4 px-6 border-t border-gray-200 space-y-1">
                            @foreach($event->lightingThemes as $lighting)
                                <div class="text-sm">{{ $lighting->name }} - ${{ number_format($lighting->price, 2) }}</div>
                            @endforeach
                        </td>
                        <td class="py-4 px-6 border-t border-gray-200 text-center flex space-x-2">
                            <!-- Edit Button -->
                            <a href="{{ route('events.edit', $event->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 transition duration-200">
                                Edit
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 transition duration-200" onclick="return confirm('Are you sure you want to delete this event?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection









