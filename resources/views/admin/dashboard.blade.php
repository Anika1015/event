<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Add your stylesheets or use a CSS framework like Bootstrap -->
</head>
<body>
    <div class="container">
        <h2>Welcome to the Admin Dashboard</h2>

        <p>Here you can manage the system, view reports, and configure settings.</p>

        <a href="{{ route('admin.logout') }}">Logout</a>
    </div>
</body>
</html>