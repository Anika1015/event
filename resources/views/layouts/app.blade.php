<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Tailwind and Custom Styles -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Custom Styles */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        .glow-button {
            transition: all 0.3s ease-in-out;
        }
        .glow-button:hover {
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.8);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-500 to-purple-700 text-white">
    <div id="app" class="w-full max-w-md p-6 glass">
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
        </form>
    </div>
</body>
</html>

