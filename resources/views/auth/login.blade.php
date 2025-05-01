@extends('layouts.app')

@section('form-content')
<h2 class="text-3xl font-bold text-center mb-6">🔑 Login</h2>

<form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Field -->
    <div class="mb-4">
        <label for="email" class="block text-white text-sm font-semibold">Email Address</label>
        <input id="email" type="email" name="email" required autofocus
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
               placeholder="Enter your password">
        @error('password')
        <span class="text-red-400 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Remember Me -->
    <div class="flex items-center justify-between mb-4 text-sm">
        <div>
            <input type="checkbox" name="remember" id="remember" class="mr-1">
            <label for="remember">Remember Me</label>
        </div>
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-blue-300 hover:underline">Forgot Password?</a>
        @endif
    </div>

    <!-- Submit Button -->
    <button type="submit"
            class="w-full py-2 text-lg font-bold bg-gradient-to-r from-blue-500 to-purple-500 rounded-md glow-button transition transform hover:scale-105">
        🔒 Login
    </button>

    <p class="mt-4 text-center text-sm">
        Don't have an account? <a href="{{ route('register') }}" class="text-blue-300 hover:underline">Register here</a>.
    </p>
</form>
@endsection

