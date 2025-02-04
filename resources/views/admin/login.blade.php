<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Add your stylesheets or use a CSS framework like Bootstrap -->
</head>
<body>
    <div class="container">
        <h2>Admin Login</h2>
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <button type="submit">Login</button>
        </form>

    </div>
</body>
</html>