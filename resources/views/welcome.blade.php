@extends('Layout.master')

@section('title', 'Dashboard Page')

@section('content')
    <div class="text-center">
        <h1>Welcome to the Dashboard Page</h1>
        <p>This is the content of the home page.</p>

        <!-- Authenticated Links -->
        <div class="mt-4">
            @if (Route::has('login'))
                @auth
                    <!-- If the user is logged in -->
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary me-2">Go to Dashboard</a>
                @else
                    <!-- If the user is not logged in -->
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-success">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
@endsection
