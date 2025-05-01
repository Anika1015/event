@extends('layout.adminMaster')

@section('content')
 
 @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-8 shadow-md">
            <p class="font-medium">{{ session('success') }}</p>
        </div>
    @endif

<div class="container">


<h2 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-gray-800 via-gray-600 to-brown-700 p-6 rounded-lg shadow-xl text-center">
    Edit Event
</h2>



    <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <button type="button" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700" onclick="showForm('venue')">+ Add Venue</button>
    <button type="button" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700" onclick="showForm('dish')">+ Add Dish</button>
    <button type="button" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700" onclick="showForm('lighting')">+ Add Theme</button>

    <button type="submit" class="bg-red-600 text-white px-8 py-3 rounded-lg hover:bg-red-700 mt-4">Save All</button>

    <!-- Hidden Forms for Adding New Items -->
    <div id="venueForm" class="hidden mt-4">
        <h3>Add New Venue</h3>
        <input type="text" id="venueName" name="venue[name]" class="form-control" placeholder="Venue Name">
        <input type="number" id="venuePrice" name="venue[price]" class="form-control mt-2" placeholder="Price">
        <input type="text" id="venueImage" name="venue[image]" class="form-control mt-2" placeholder="Enter Venue Image URL">
        <button type="button" class="bg-blue-600 text-white px-4 py-2 mt-2" onclick="addVenue()">Add Venue</button>
    </div>

    <div id="dishForm" class="hidden mt-4">
        <h3>Add New Dish Package</h3>
        <input type="text" id="dishName" name="dish[name]" class="form-control" placeholder="Dish Name">
        <input type="number" id="dishPrice" name="dish[price_per_guest]" class="form-control mt-2" placeholder="Price per Guest">
        <input type="text" id="dishImage" name="dish[image]" class="form-control mt-2" placeholder="Enter Dish Image URL">
        <button type="button" class="bg-blue-600 text-white px-4 py-2 mt-2" onclick="addDish()">Add Dish</button>
    </div>

    <div id="lightingForm" class="hidden mt-4">
        <h3>Add New Lighting Theme</h3>
        <input type="text" id="lightingName" name="lighting[name]" class="form-control" placeholder="Lighting Theme Name">
        <input type="number" id="lightingPrice" name="lighting[price]" class="form-control mt-2" placeholder="Price">
        <input type="text" id="lightingImage" name="lighting[image]" class="form-control mt-2" placeholder="Enter Lighting Image URL">
        <button type="button" class="bg-blue-600 text-white px-4 py-2 mt-2" onclick="addLighting()">Add Lighting</button>
    </div>


   <h1 class="mt-4 text-3xl font-bold text-white bg-gradient-to-r from-blue-400 to-blue-600 p-4 rounded-lg shadow-md text-center">
    Venues
</h1>
    <div id="venues" class="border-2 border-blue-300 p-6 rounded-lg mt-4 bg-gradient-to-r from-blue-50 via-indigo-50 to-blue-100">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($event->venues as $venue)
            <div class="venue-item border border-blue-200 bg-white p-5 rounded-lg shadow-xl hover:shadow-2xl transition duration-300 ease-in-out">
                
                
                <label for="venueName" class="block text-sm font-semibold text-gray-700 mb-1">Venue Name</label>
                <input type="hidden" name="venues[{{ $venue->id }}][id]" value="{{ $venue->id }}">
                <input type="text" name="venues[{{ $venue->id }}][name]" value="{{ $venue->name }}" id="venueName" class="form-control w-full p-2 mb-4 border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition-all" placeholder="Venue Name">

                
                <label for="venuePrice" class="block text-sm font-semibold text-gray-700 mb-1">Price</label>
                <input type="number" name="venues[{{ $venue->id }}][price]" value="{{ $venue->price }}" id="venuePrice" class="form-control w-full p-2 mb-4 border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition-all" placeholder="Price">

                
                <label for="venueImage" class="block text-sm font-semibold text-gray-700 mb-1">Image URL</label>
                <input type="text" name="venues[{{ $venue->id }}][image]" id="venueImage" class="form-control w-full p-2 mb-4 border border-blue-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition-all" placeholder="Enter Venue Image URL" value="{{ old('venues.' . $venue->id . '.image', $venue->image) }}">

                <!-- Image Preview -->
                <div class="flex justify-center mt-3 mb-4">
                    <img src="{{ $venue->image ? $venue->image : '' }}" class="w-32 h-32 object-cover rounded-lg shadow-md" alt="Venue Image Preview">
                </div>

                
            </div>
        @endforeach
    </div>
</div>









    <!-- Dish Packages Section -->
    <h1 class="mt-4 text-3xl font-bold text-white bg-gradient-to-r from-green-400 to-green-600 p-4 rounded-lg shadow-md text-center">
    Dish Packages
</h1>

<div id="dishPackages" class="border-2 border-green-300 p-6 rounded-lg mt-4 bg-green-50">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($event->dishPackages as $dish)
            <div class="dish-item border border-green-200 bg-white p-5 rounded-lg shadow-xl hover:shadow-2xl transition duration-300 ease-in-out">
                
                
                <label for="dishName" class="block text-sm font-semibold text-gray-700 mb-1">Dish Name</label>
                <input type="hidden" name="dish_packages[{{ $dish->id }}][id]" value="{{ $dish->id }}">
                <input type="text" name="dish_packages[{{ $dish->id }}][name]" value="{{ $dish->name }}" id="dishName" class="form-control w-full p-2 mb-4 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-500 transition-all" placeholder="Dish Name">

               
                <label for="dishPrice" class="block text-sm font-semibold text-gray-700 mb-1">Price per Guest</label>
                <input type="number" name="dish_packages[{{ $dish->id }}][price_per_guest]" value="{{ $dish->price_per_guest }}" id="dishPrice" class="form-control w-full p-2 mb-4 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-500 transition-all" placeholder="Price per Guest">

               
                <label for="dishImage" class="block text-sm font-semibold text-gray-700 mb-1">Image URL</label>
                <input type="text" name="dish_packages[{{ $dish->id }}][image]" id="dishImage" class="form-control w-full p-2 mb-4 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-500 transition-all" placeholder="Enter Dish Image URL" value="{{ old('dish_packages.' . $dish->id . '.image', $dish->image) }}">

                <!-- Image Preview -->
                <div class="flex justify-center mt-4 mb-4">
                    <img src="{{ $dish->image ? $dish->image : '' }}" class="w-32 h-32 object-cover rounded-lg shadow-md" alt="Dish Image Preview">
                </div>

                
            </div>
        @endforeach
    </div>
</div>






    <!-- Lighting Themes Section -->
    <h1 class="mt-4 text-3xl font-bold text-white bg-gradient-to-r from-yellow-400 to-yellow-600 p-4 rounded-lg shadow-md text-center">
    Lighting Themes
</h1>

<div id="lightingThemes" class="border-2 border-yellow-300 p-6 rounded-lg mt-4 bg-yellow-50">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($event->lightingThemes as $lighting)
            <div class="lighting-item border border-yellow-200 bg-white p-5 rounded-lg shadow-xl hover:shadow-2xl transition duration-300 ease-in-out">
                
                
                <label for="lightingName" class="block text-sm font-semibold text-gray-700 mb-1">Lighting Name</label>
                <input type="hidden" name="lighting_themes[{{ $lighting->id }}][id]" value="{{ $lighting->id }}">
                <input type="text" name="lighting_themes[{{ $lighting->id }}][name]" value="{{ $lighting->name }}" id="lightingName" class="form-control w-full p-2 mb-4 border border-yellow-300 rounded-lg focus:ring-2 focus:ring-yellow-500 transition-all" placeholder="Lighting Name">

                
                <label for="lightingPrice" class="block text-sm font-semibold text-gray-700 mb-1">Price</label>
                <input type="number" name="lighting_themes[{{ $lighting->id }}][price]" value="{{ $lighting->price }}" id="lightingPrice" class="form-control w-full p-2 mb-4 border border-yellow-300 rounded-lg focus:ring-2 focus:ring-yellow-500 transition-all" placeholder="Price">

                
                <label for="lightingImage" class="block text-sm font-semibold text-gray-700 mb-1">Image URL</label>
                <input type="text" name="lighting_themes[{{ $lighting->id }}][image]" id="lightingImage" class="form-control w-full p-2 mb-4 border border-yellow-300 rounded-lg focus:ring-2 focus:ring-yellow-500 transition-all" placeholder="Enter Lighting Image URL" value="{{ old('lighting_themes.' . $lighting->id . '.image', $lighting->image) }}">

                <!-- Image Preview -->
                <div class="flex justify-center mt-4 mb-4">
                    <img src="{{ $lighting->image ? $lighting->image : '' }}" class="w-32 h-32 object-cover rounded-lg shadow-md" alt="Lighting Image Preview">
                </div>

                
            </div>
        @endforeach
    </div>
</div>






</form>

<script>
    function showForm(type) {
        // Hide all forms first
        document.getElementById('venueForm').classList.add('hidden');
        document.getElementById('dishForm').classList.add('hidden');
        document.getElementById('lightingForm').classList.add('hidden');

        // Show the specific form based on the type
        if (type === 'venue') {
            document.getElementById('venueForm').classList.remove('hidden');
        } else if (type === 'dish') {
            document.getElementById('dishForm').classList.remove('hidden');
        } else if (type === 'lighting') {
            document.getElementById('lightingForm').classList.remove('hidden');
        }
    }

    function addVenue() {
        let name = document.getElementById('venueName').value;
        let price = document.getElementById('venuePrice').value;
        let image = document.getElementById('venueImage').value;

        if (name && price && image) {
            let venueHTML = `
                <div class="venue-item">
                    <input type="text" name="venues[new][name]" value="${name}" class="form-control" placeholder="Venue Name">
                    <input type="number" name="venues[new][price]" value="${price}" class="form-control" placeholder="Price">
                    <input type="text" name="venues[new][image]" value="${image}" class="form-control" placeholder="Enter Venue Image URL">
                </div>
            `;
            document.getElementById('venues').insertAdjacentHTML('beforeend', venueHTML);
            document.getElementById('venueForm').classList.add('hidden');
        }
    }

    function addDish() {
        let name = document.getElementById('dishName').value;
        let price = document.getElementById('dishPrice').value;
        let image = document.getElementById('dishImage').value;

        if (name && price && image) {
            let dishHTML = `
                <div class="dish-item">
                    <input type="text" name="dish_packages[new][name]" value="${name}" class="form-control" placeholder="Dish Name">
                    <input type="number" name="dish_packages[new][price_per_guest]" value="${price}" class="form-control" placeholder="Price per Guest">
                    <input type="text" name="dish_packages[new][image]" value="${image}" class="form-control" placeholder="Enter Dish Image URL">
                </div>
            `;
            document.getElementById('dishPackages').insertAdjacentHTML('beforeend', dishHTML);
            document.getElementById('dishForm').classList.add('hidden');
        }
    }

    function addLighting() {
        let name = document.getElementById('lightingName').value;
        let price = document.getElementById('lightingPrice').value;
        let image = document.getElementById('lightingImage').value;

        if (name && price && image) {
            let lightingHTML = `
                <div class="lighting-item">
                    <input type="text" name="lighting_themes[new][name]" value="${name}" class="form-control" placeholder="Lighting Theme Name">
                    <input type="number" name="lighting_themes[new][price]" value="${price}" class="form-control" placeholder="Price">
                    <input type="text" name="lighting_themes[new][image]" value="${image}" class="form-control" placeholder="Enter Lighting Image URL">
                </div>
            `;
            document.getElementById('lightingThemes').insertAdjacentHTML('beforeend', lightingHTML);
            document.getElementById('lightingForm').classList.add('hidden');
        }
    }
</script>

@endsection

















