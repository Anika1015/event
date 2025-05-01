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