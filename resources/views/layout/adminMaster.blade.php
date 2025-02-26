<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html, body {
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .content-wrapper {
            flex: 1;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg py-4">
        <div class="max-w-6xl mx-auto flex justify-between items-center px-6">
            <h1 class="text-2xl font-bold text-gray-800">Event Planner</h1>
            <ul class="flex space-x-6">
                <li><a href="{{ route('admin.dashboard') }}" class="text-gray-800 hover:text-gray-500">Home</a></li>
                <li><a href="{{ route('admin.payments.index') }}" class="text-gray-800 hover:text-gray-500">Payment Info</a></li>
                <li><a href="{{ route('events.manage') }}" class="text-gray-800 hover:text-gray-500">Manage Events</a></li>
                <li><a href="{{ route('admin.index') }}" class="text-gray-800 hover:text-gray-500">Request</a></li>
    
                <li>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content-wrapper">
        <div class="max-w-4xl mx-auto mt-8 bg-white p-6 rounded-lg shadow-lg">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white text-center py-6">
        <p>&copy; 2025 Event Planner. All rights reserved.</p>
    </footer>
</body>
</html>