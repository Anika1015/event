<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 50px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        .message {
            font-size: 18px;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .accepted {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .rejected {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .pending {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Booking Status</h2>
        
        <!-- Check if a booking exists -->
        @if(isset($booking))
            <div class="message">
                @if($booking->status === 'accepted')
                    <div class="accepted">Your booking has been <strong>accepted</strong>. Please proceed with payment.
                    <br>
                    <a href="{{ route('payment.form', ['id' => $booking->EventID]) }}" class="btn">Proceed to Payment</a>
                    </div>
                    @elseif($booking->status === 'rejected')
                    <div class="rejected">Sorry, your booking request was <strong>rejected</strong>.</div>
                @else
                    <div class="pending">Your booking request is <strong>pending</strong> review.</div>
                @endif
            </div>
        @else
            <div class="message">{{ $message }}</div>
        @endif
    </div>
</body>
</html>


