<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Planner</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            text-align: center;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding: 20px;
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 10px;
        }
        p {
            font-size: 1.2rem;
            max-width: 600px;
            margin-bottom: 20px;
        }
        .auth-buttons {
            display: flex;
            gap: 15px;
        }
        .auth-button {
            background-color: white;
            color: #2575fc;
            border: none;
            padding: 15px 30px;
            font-size: 1.2rem;
            border-radius: 30px;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
        }
        .auth-button:hover {
            background-color: #f0f0f0;
        }
        .features {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
        }
        .feature-card {
            background: white;
            color: black;
            padding: 20px;
            border-radius: 15px;
            width: 250px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .feature-card img {
            height: 100px;
            width: 200px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Plan Your Perfect Event with Us</h1>
        <p>From weddings to corporate meetings, we make event planning effortless and memorable.</p>
        
        <div class="auth-buttons">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="auth-button">Go to Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="auth-button">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="auth-button">Register</a>
                    @endif
                @endauth
            @endif
        </div>
        
        <div class="features">
            <div class="feature-card">
                <img src="https://www.proglobalevents.com/wp-content/uploads/bigstock-People-Planning-Concept-Entre-327380749-1-1536x864.jpg.avif" alt="Event Scheduling">
                <h3>Event Scheduling</h3>
                <p>Seamless scheduling for all your events with real-time updates.</p>
            </div>
            <div class="feature-card">
                <img src="https://worksol.uk/wp-content/uploads/2024/08/Untitled-design-32-1536x1025.png" alt="Premium Services">
                <h3>Premium Services</h3>
                <p>Exclusive packages tailored to meet your event needs.</p>
            </div>
            <div class="feature-card">
                <img src="https://www.glasscubes.com/assets/Uploads/how-to-improve-cross-team-collaboration-13-experts-weigh-in.jpg" alt="Team Collaboration">
                <h3>Team Collaboration</h3>
                <p>Work with a dedicated team to create unforgettable experiences.</p>
            </div>
        </div>
    </div>
</body>
</html>

