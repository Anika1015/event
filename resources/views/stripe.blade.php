@extends('layout.Master')

@section('content')
<div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Payment</h2>

    <!-- Order Summary -->
    <div class="p-4 bg-gray-100 rounded-lg mb-4">
        <h3 class="text-lg font-medium mb-2">Order Summary</h3>
        <ul class="list-none">
            <li class="flex justify-between border-b pb-2 mb-2">
                <span>Venue: <strong>{{ $booking->venue->name }}</strong></span>
                <span>${{ $booking->venue->price }}</span>
            </li>
            <li class="flex justify-between border-b pb-2 mb-2">
                <span>Dish Package: <strong>{{ $booking->dishPackage->name }}</strong> (x{{ $booking->number_of_guests }} guests)</span>
                <span>${{ $booking->dishPackage->price_per_guest * $booking->number_of_guests }}</span>
            </li>
            <li class="flex justify-between border-b pb-2 mb-2">
                <span>Lighting & Theme: <strong>{{ $booking->lightingTheme->name }}</strong></span>
                <span>${{ $booking->lightingTheme->price }}</span>
            </li>
            <li class="flex justify-between text-lg font-bold">
                <span>Total</span>
                <span>${{ $total_price }}</span>
            </li>
        </ul>
    </div>

    <form action="{{ route('stripe.charge') }}" method="POST" id="payment-form">
    @csrf
    <div id="card-element">
       
    </div>
    <div id="card-errors" role="alert"></div>
    <input type="hidden" name="stripeToken" id="stripeToken">
    <input type="hidden" name="amount" value="{{ $total_price }}" id="amount">
    <input type="hidden" name="booking_id" value="{{ $booking->BookingID }}" id="booking_id"> 
    <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition">
        Pay Now
    </button>
</form>




</div>

<script src="https://js.stripe.com/v3/"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Initialize Stripe
    var stripe = Stripe("{{ env('STRIPE_PUBLIC') }}");
    var elements = stripe.elements();

    // Create an instance of the card Element
    var card = elements.create('card');

    // Mount the card Element to the DOM
    card.mount('#card-element');

    // Handle form submission
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                document.getElementById('card-errors').textContent = result.error.message;
            } else {
                processPayment(result.token);  // Send the entire token object
            }
        });
    });

    function processPayment(token) {
    $.ajax({
        url: "{{ route('stripe.charge') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            stripeToken: token.id,
            amount: parseInt($("#amount").val() * 100), // Convert to cents
            booking_id: $("#booking_id").val()
        },
        success: function(response) {
            if (response.success) {
                // Redirect directly to the success page after successful payment
                window.location.href = response.redirect_url;
            } else {
                // Optionally handle any errors (you can just log them)
                window.location.href = "{{ route('payment.error') }}"; // Define an error route if needed
            }
        },
        error: function(xhr) {
            // Handle any AJAX errors here, and directly redirect to an error page if necessary
            window.location.href = "{{ route('payment.error') }}"; // Define an error route if needed
        }
    });
}

</script>
@endsection







