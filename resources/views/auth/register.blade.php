@extends('layouts.app')

@section('form-content')
<h2 class="text-3xl font-bold text-center mb-6">📝 Register</h2>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name Field -->
    <div class="mb-4">
        <label for="name" class="block text-white text-sm font-semibold">Full Name</label>
        <input id="name" type="text" name="name" required
               class="w-full px-4 py-2 border-none rounded-md bg-white bg-opacity-20 text-white focus:ring-2 focus:ring-blue-400 focus:outline-none placeholder-white"
               placeholder="Enter your full name">
        @error('name')
        <span class="text-red-400 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Email Field -->
    <div class="mb-4">
        <label for="email" class="block text-white text-sm font-semibold">Email Address</label>
        <input id="email" type="email" name="email" required
               class="w-full px-4 py-2 border-none rounded-md bg-white bg-opacity-20 text-white focus:ring-2 focus:ring-blue-400 focus:outline-none placeholder-white"
               placeholder="Enter your email">
        @error('email')
        <span class="text-red-400 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Password Field -->
    <div class="mb-4">
        <label for="password" class="block text-white text-sm font-semibold">Password</label>
        <input id="password" type="password" name="password" required
               class="w-full px-4 py-2 border-none rounded-md bg-white bg-opacity-20 text-white focus:ring-2 focus:ring-blue-400 focus:outline-none placeholder-white"
               placeholder="Create a password">
        @error('password')
        <span class="text-red-400 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Confirm Password Field -->
    <div class="mb-4">
        <label for="password_confirmation" class="block text-white text-sm font-semibold">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required
               class="w-full px-4 py-2 border-none rounded-md bg-white bg-opacity-20 text-white focus:ring-2 focus:ring-blue-400 focus:outline-none placeholder-white"
               placeholder="Confirm your password">
    </div>

    <!-- Submit Button -->
    <button type="submit"
            class="w-full py-2 text-lg font-bold bg-gradient-to-r from-blue-500 to-purple-500 rounded-md glow-button transition transform hover:scale-105">
        🚀 Register
    </button>

    <p class="mt-4 text-center text-sm">
        Already have an account? <a href="{{ route('login') }}" class="text-blue-300 hover:underline">Login here</a>.
    </p>
</form>
@endsection
