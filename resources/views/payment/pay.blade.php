<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
</head>
<body>
    @if(session('status'))
        <div class="alert alert-info">
            {{ session('status') }}
        </div>
    @endif

    @if($booking->status === 'awaiting_payment')
        <p>Click below to make the payment for your booking:</p>
        <p>Amount: ${{ $booking->amount }}</p>
        <a href="{{ route('payment.process', ['booking_id' => $booking->BookingID]) }}">Pay Now</a>
    @else
        <p>Your booking is not yet approved or has been rejected.</p>
    @endif
</body>
</html>



