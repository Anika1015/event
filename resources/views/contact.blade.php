@extends('layout.master')

@section('title', 'Contact Us')

@section('content')
    <!-- Hero Section -->
    <section class="text-center py-16 bg-gradient-to-r from-blue-500 to-purple-500 text-white">
        <h2 class="text-5xl font-bold mb-4">Get in Touch</h2>
        <p class="text-xl font-light max-w-3xl mx-auto">We’d love to hear from you! Whether you have questions, need help with event planning, or just want to say hello, feel free to reach out.</p>
    </section>

    <!-- Contact Form Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-5xl mx-auto px-6">
            <h3 class="text-4xl font-semibold text-gray-800 text-center mb-10">Send Us a Message</h3>

            <div class="bg-white p-8 rounded-lg shadow-lg">
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Your Name</label>
                            <input type="text" name="name" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-400" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Your Email</label>
                            <input type="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-400" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Subject</label>
                        <input type="text" name="subject" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-400" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Message</label>
                        <textarea name="message" rows="5" class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-400" required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-8 rounded-lg shadow-lg transition-all transform hover:scale-105">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="py-16">
        <div class="max-w-5xl mx-auto px-6">
            <h3 class="text-4xl font-semibold text-gray-800 text-center mb-10">Our Contact Information</h3>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 text-center">
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    <i class="fas fa-phone text-blue-500 text-3xl mb-3"></i>
                    <h4 class="text-xl font-semibold text-gray-800">Call Us</h4>
                    <p class="text-gray-600 mt-2">01812442241</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    <i class="fas fa-envelope text-blue-500 text-3xl mb-3"></i>
                    <h4 class="text-xl font-semibold text-gray-800">Email Us</h4>
                    <p class="text-gray-600 mt-2">support@eventplanner.com</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    <i class="fas fa-map-marker-alt text-blue-500 text-3xl mb-3"></i>
                    <h4 class="text-xl font-semibold text-gray-800">Visit Us</h4>
                    <p class="text-gray-600 mt-2">Anderkilla,Chittagong</p>
                </div>
            </div>
        </div>
    </section>

   

@endsection
