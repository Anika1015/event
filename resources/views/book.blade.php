@extends('layout.Master')

@if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-300 rounded-lg">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="mb-4 p-4 bg-red-100 text-red-800 border border-red-300 rounded-lg">
        {{ session('error') }}
    </div>
@endif


@section('content')
<div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Event Booking</h2>

    <form method="POST" action="{{ route('booking.store', ['event_id' => $event_id]) }}">
        @csrf

        <!-- Select Venue -->
        <div class="mb-6">
            <h3 class="text-lg font-medium">Select Venue</h3>
            <div class="flex space-x-4">
                @foreach($venues as $venue)
                <div class="cursor-pointer border rounded-lg p-2 hover:shadow-lg venue-option"
                     data-id="{{ $venue->id }}"
                     data-price="{{ $venue->price }}"
                     onclick="selectVenue(this)">
                     <img src="{{ $venue->image }}" alt="{{ $venue->name }}" class="w-32 h-32 object-cover rounded-lg">
                    <p class="text-center mt-2">{{ $venue->name }} - ${{ $venue->price }}</p>
                </div>
                @endforeach
            </div>
            <input type="hidden" name="venue_id" id="selected_venue" value="{{ $venues->first()->id }}">
        </div>

        <!-- Select Dish Package -->
        <div class="mb-6">
            <h3 class="text-lg font-medium">Select Dish Package</h3>
            <div class="flex space-x-4">
                @foreach($dishPackages as $package)
                <div class="cursor-pointer border rounded-lg p-2 hover:shadow-lg dish-option"
                     data-id="{{ $package->id }}"
                     data-price="{{ $package->price_per_guest }}"
                     onclick="selectDish(this)">
                    <img src="{{ $package->image }}" alt="{{ $package->name }}" class="w-32 h-32 object-cover rounded-lg">
                    <p class="text-center mt-2">{{ $package->name }} - ${{ $package->price_per_guest }} per guest</p>
                </div>
                @endforeach
            </div>
            <input type="hidden" name="dish_package_id" id="selected_dish" value="{{ $dishPackages->first()->id }}">
        </div>

        <!-- Select Lighting & Theme -->
        <div class="mb-6">
            <h3 class="text-lg font-medium">Select Lighting & Theme</h3>
            <div class="flex space-x-4">
                @foreach($lightingThemes as $theme)
                <div class="cursor-pointer border rounded-lg p-2 hover:shadow-lg theme-option"
                     data-id="{{ $theme->id }}"
                     data-price="{{ $theme->price }}"
                     onclick="selectTheme(this)">
                    <img src="{{ $theme->image }}" alt="{{ $theme->name }}" class="w-32 h-32 object-cover rounded-lg">
                    <p class="text-center mt-2">{{ $theme->name }} - ${{ $theme->price }}</p>
                </div>
                @endforeach
            </div>
            <input type="hidden" name="lighting_theme_id" id="selected_theme" value="{{ $lightingThemes->first()->id }}">
        </div>

        <!-- Event Details -->
        <div class="mb-4">
            <label for="event_date" class="block text-gray-700 text-sm font-medium">Event Date</label>
            <input type="date" name="event_date" id="event_date" class="w-full mt-1 p-3 border border-gray-300 rounded-lg" required>
        </div>

         <!--    
        <div class="mb-4">
            <label for="location" class="block text-gray-700 text-sm font-medium">Location</label>
            <input type="text" name="location" id="location" class="w-full mt-1 p-3 border border-gray-300 rounded-lg" required>
        </div>
        -->

        <div class="mb-4">
            <label for="time_slot" class="block text-gray-700 text-sm font-medium">Time Slot</label>
            <select name="time_slot" id="time_slot" class="w-full mt-1 p-3 border border-gray-300 rounded-lg" required>
                <option value="afternoon">Afternoon</option>
                <option value="night">Night</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="number_of_guests" class="block text-gray-700 text-sm font-medium">Number of Guests</label>
            <input type="number" name="number_of_guests" id="number_of_guests" class="w-full mt-1 p-3 border border-gray-300 rounded-lg" min="1" required oninput="calculatePrice()">
        </div>

        <div class="mb-4">
            <label for="total_price" class="block text-gray-700 text-sm font-medium">Total Price</label>
            <input type="text" id="total_price" class="w-full mt-1 p-3 border border-gray-300 rounded-lg" readonly>
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-lg text-lg transition-all mt-4">Submit Booking</button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector(".venue-option")?.classList.add("border-blue-500");
        document.querySelector(".dish-option")?.classList.add("border-blue-500");
        document.querySelector(".theme-option")?.classList.add("border-blue-500");
        
        document.getElementById("selected_venue").value = document.querySelector(".venue-option")?.dataset.id;
        document.getElementById("selected_dish").value = document.querySelector(".dish-option")?.dataset.id;
        document.getElementById("selected_theme").value = document.querySelector(".theme-option")?.dataset.id;

        calculatePrice();
    });

    function selectVenue(element) {
        document.querySelectorAll(".venue-option").forEach(item => item.classList.remove("border-blue-500"));
        element.classList.add("border-blue-500");
        document.getElementById("selected_venue").value = element.dataset.id;
        calculatePrice();
    }

    function selectDish(element) {
        document.querySelectorAll(".dish-option").forEach(item => item.classList.remove("border-blue-500"));
        element.classList.add("border-blue-500");
        document.getElementById("selected_dish").value = element.dataset.id;
        calculatePrice();
    }

    function selectTheme(element) {
        document.querySelectorAll(".theme-option").forEach(item => item.classList.remove("border-blue-500"));
        element.classList.add("border-blue-500");
        document.getElementById("selected_theme").value = element.dataset.id;
        calculatePrice();
    }

    function calculatePrice() {
        let venuePrice = parseFloat(document.querySelector(".venue-option.border-blue-500")?.dataset.price || 0);
        let dishPrice = parseFloat(document.querySelector(".dish-option.border-blue-500")?.dataset.price || 0);
        let themePrice = parseFloat(document.querySelector(".theme-option.border-blue-500")?.dataset.price || 0);
        let guests = parseInt(document.getElementById("number_of_guests").value) || 1;

        let totalPrice = venuePrice + (dishPrice * guests) + themePrice;
        document.getElementById("total_price").value = "$" + totalPrice.toFixed(2);
    }
</script>
@endsection

