@extends('layout.master')

@section('title', 'About Us')

@section('content')
    <!-- Hero Section -->
    <section class="text-center py-16 bg-gradient-to-r from-blue-500 to-purple-500 text-white">
        <h2 class="text-5xl font-bold mb-4">About Event Planner</h2>
        <p class="text-xl font-light max-w-3xl mx-auto">Creating unforgettable experiences, one event at a time.</p>
    </section>

    <!-- Our Story Section -->
    <section class="py-16 bg-gray-100">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <h3 class="text-4xl font-semibold text-gray-800 mb-6">Our Story</h3>
            <p class="text-lg text-gray-700 leading-relaxed">
                At Event Planner, we believe every moment deserves to be celebrated. Our journey started with a simple
                idea — to help people bring their dreams to life through exceptional events. 
                <br><br>
                From corporate meetings to
                weddings, we’ve made it our mission to handle every detail, so our clients can focus on enjoying the
                experience. Today, we are proud to be one of the most trusted event planning companies, known for our
                creativity, attention to detail, and commitment to excellence.
            </p>
        </div>
    </section>

    <!-- Our Mission -->
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h3 class="text-4xl font-semibold text-gray-800 mb-6">Our Mission</h3>
            <p class="text-lg text-gray-700 leading-relaxed">
                Our mission is simple: to create unforgettable events that leave a lasting impression. Whether it's a
                wedding, corporate event, or special celebration, we strive to provide a seamless experience from start
                to finish.
                <br><br>
                With a passion for perfection and an eye for detail, we ensure that every event is a success.
            </p>
        </div>
    </section>

    
    <!-- Contact Us Section -->
    <section class="py-16 bg-gradient-to-r from-blue-600 to-purple-600 text-white text-center">
        <div class="max-w-4xl mx-auto px-6">
            <h3 class="text-4xl font-semibold mb-6">Get in Touch</h3>
            <p class="text-lg mb-8">Ready to plan your next event? Let us help bring your vision to life. Contact us today!</p>
            <a href="{{ route('contact')}}" class="bg-red-500 hover:bg-red-600 text-white py-3 px-8 rounded-full text-lg shadow-lg transition-all transform hover:scale-110">Contact Us</a>
        </div>
    </section>
@endsection

