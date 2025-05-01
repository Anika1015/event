@extends('Layout.master')



@section('title', 'Dashboard Page')

@section('content')

@if(session('error'))
    <div class="bg-red-100 text-red-800 p-4 border-l-4 border-red-500 mb-4">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-4 border-l-4 border-green-500 mb-4">
        {{ session('success') }}
    </div>
@endif


<!-- Hero Section -->
<section class="relative bg-cover bg-center h-screen flex items-center justify-center" 
    style="background-image: url('https://source.unsplash.com/1600x900/?party,event');">
    <div class="bg-black bg-opacity-60 p-12 text-center text-white rounded-lg backdrop-blur-lg">
        <h1 class="text-6xl font-extrabold animate-fade-in">Make Your Event Unforgettable 🎉</h1>
        <p class="text-lg mt-4 text-gray-300">We craft extraordinary events tailored to your vision.</p>
        <a href="#contact" 
           class="mt-6 inline-block bg-gradient-to-r from-yellow-400 to-yellow-600 hover:scale-105 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition-transform">
            Plan Your Event
        </a>
    </div>
</section>

<!-- Featured Events -->
<section class="py-16 px-6">
    <h2 class="text-4xl font-bold text-center mb-10 text-gray-800">Our Featured Events ✨</h2>
    <div class="grid md:grid-cols-3 gap-8">
        <!-- Event Card -->
        @foreach([
            ['image' => 'https://weddingsecrets.in/wp-content/uploads/2023/09/c1109de0f58b4749cc5865e0422c5269-1.jpg', 'title' => 'Luxury Weddings', 'desc' => 'Celebrate love with a perfectly curated wedding.'],
            ['image' => 'https://5.imimg.com/data5/EH/GD/LG/SELLER-23933285/corporate-event-management-service-1000x1000.jpg', 'title' => 'Corporate Gatherings', 'desc' => 'Elegant and seamless corporate events.'],
            ['image' => 'https://11-11av.com/wp-content/uploads/2023/07/About-us-3.png', 'title' => 'Exclusive Parties', 'desc' => 'Let’s make your party a night to remember!']
        ] as $event)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition duration-300">
            <img src="{{ $event['image'] }}" class="w-full h-60 object-cover" alt="{{ $event['title'] }}">
            <div class="p-6">
                <h3 class="text-xl font-semibold text-gray-800">{{ $event['title'] }}</h3>
                <p class="text-gray-600 mt-2">{{ $event['desc'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-16 bg-gradient-to-br from-gray-900 to-gray-700 text-white text-center">
    <h2 class="text-4xl font-bold">Get in Touch 📞</h2>
    <p class="text-lg mt-4 text-gray-300">Let's start planning your dream event today!</p>
    <a href="mailto:contact@eventplanner.com" 
       class="mt-6 inline-block bg-gradient-to-r from-yellow-400 to-yellow-600 hover:scale-105 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition-transform">
        Contact Us
    </a>
</section>

@endsection


