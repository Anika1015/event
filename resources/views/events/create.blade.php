@extends('layout.adminMaster')

@section('content')
<div class="container mx-auto p-6 bg-white rounded-lg shadow-lg mt-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">
        Create New Event
    </h2>

    <form action="{{ route('events.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Event Details -->
        <div class="mb-6">
            <label for="title" class="block text-lg font-semibold text-gray-700">Title</label>
            <input type="text" name="title" id="title" class="form-control w-full p-3 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required placeholder="Enter Event Title">
        </div>

        <div class="mb-6">
            <label for="description" class="block text-lg font-semibold text-gray-700">Description</label>
            <textarea name="description" id="description" class="form-control w-full p-3 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required placeholder="Enter Event Description"></textarea>
        </div>

        <!-- Venues Section -->
        <h4 class="text-2xl font-semibold text-gray-800 mb-4">Venues</h4>
        <div id="venue-container">
            <div class="mb-4">
                <label for="venueName" class="block text-sm font-medium text-gray-700">Venue Name</label>
                <input type="text" name="venues[0][name]" class="form-control w-full p-3 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Venue Name" required>

                <label for="venuePrice" class="block text-sm font-medium text-gray-700 mt-3">Price</label>
                <input type="number" name="venues[0][price]" class="form-control w-full p-3 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Venue Price" required>
            </div>
        </div>
        <button type="button" class="btn btn-secondary w-full py-3 text-white bg-blue-500 hover:bg-blue-600 rounded-lg focus:outline-none" onclick="addVenue()">Add More Venues</button>

        <!-- Dish Packages Section -->
        <h4 class="text-2xl font-semibold text-gray-800 mb-4 mt-8">Dish Packages</h4>
        <div id="dish-container">
            <div class="mb-4">
                <label for="dishName" class="block text-sm font-medium text-gray-700">Dish Package Name</label>
                <input type="text" name="dish_packages[0][name]" class="form-control w-full p-3 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Dish Package Name" required>

                <label for="dishPrice" class="block text-sm font-medium text-gray-700 mt-3">Price per Guest</label>
                <input type="number" name="dish_packages[0][price_per_guest]" class="form-control w-full p-3 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Price per Guest" required>
            </div>
        </div>
        <button type="button" class="btn btn-secondary w-full py-3 text-white bg-green-500 hover:bg-green-600 rounded-lg focus:outline-none" onclick="addDish()">Add More Dishes</button>

        <!-- Lighting Themes Section -->
        <h4 class="text-2xl font-semibold text-gray-800 mb-4 mt-8">Lighting Themes</h4>
        <div id="lighting-container">
            <div class="mb-4">
                <label for="lightingName" class="block text-sm font-medium text-gray-700">Lighting Theme Name</label>
                <input type="text" name="lighting_themes[0][name]" class="form-control w-full p-3 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Lighting Theme Name" required>

                <label for="lightingPrice" class="block text-sm font-medium text-gray-700 mt-3">Price</label>
                <input type="number" name="lighting_themes[0][price]" class="form-control w-full p-3 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Lighting Theme Price" required>
            </div>
        </div>
        <button type="button" class="btn btn-secondary w-full py-3 text-white bg-yellow-500 hover:bg-yellow-600 rounded-lg focus:outline-none" onclick="addLighting()">Add More Lighting Themes</button>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" class="btn btn-primary w-full py-3 text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg focus:outline-none">Create Event</button>
        </div>
    </form>
</div>



<script>
    let venueCount = 1;
    let dishCount = 1;
    let lightingCount = 1;

    function addVenue() { 
    let container = document.getElementById('venue-container');
    let html = `
        <div class="mb-3">
            <label for="venue-name-${venueCount}" class="form-label">Venue Name</label>
            <input type="text" id="venue-name-${venueCount}" name="venues[${venueCount}][name]" class="form-control" required>

            <label for="venue-price-${venueCount}" class="form-label mt-2">Price</label>
            <input type="number" id="venue-price-${venueCount}" name="venues[${venueCount}][price]" class="form-control" required>
        </div>`;
    container.insertAdjacentHTML('beforeend', html);
    venueCount++;
}
    function addDish() {
        let container = document.getElementById('dish-container');
        let html = `
            <div class="mb-3">
                <input type="text" name="dish_packages[${dishCount}][name]" placeholder="Dish Package Name" class="form-control" required>
                <input type="number" name="dish_packages[${dishCount}][price_per_guest]" placeholder="Price per Guest" class="form-control mt-2" required>
            </div>`;
        container.insertAdjacentHTML('beforeend', html);
        dishCount++;
    }

    function addLighting() {
        let container = document.getElementById('lighting-container');
        let html = `
            <div class="mb-3">
                <input type="text" name="lighting_themes[${lightingCount}][name]" placeholder="Lighting Theme Name" class="form-control" required>
                <input type="number" name="lighting_themes[${lightingCount}][price]" placeholder="Price" class="form-control mt-2" required>
            </div>`;
        container.insertAdjacentHTML('beforeend', html);
        lightingCount++;
    }
</script>
@endsection
