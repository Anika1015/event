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
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-500 to-green-600 text-white">
    <div id="app" class="w-full max-w-md p-6 glass">
        @yield('form-content')
    </div>
</body>
</html>

