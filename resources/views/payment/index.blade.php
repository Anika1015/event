<script src="https://js.stripe.com/v3/"></script>

@extends('layout.master')

@section('title', 'Payment for {{ $event->title }}')

@section('content')
    <header class="page-header">
        <h2>Payment for {{ $event->title }}</h2>
    </header>

    <section class="payment-form">
        <h3>Event Details</h3>
        <p><strong>Title:</strong> {{ $event->title }}</p>
        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</p>
        <p><strong>Location:</strong> {{ $event->location }}</p>
        <p><strong>Price:</strong> ${{ number_format($event->price, 2) }}</p>

        <!-- Payment Form -->
        <form id="payment-form" action="{{ route('payment.process', $event->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="card-element">Credit Card</label>
                <div id="card-element">
                    <!-- A Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>

            <button id="submit" class="btn-submit-payment">Submit Payment</button>
        </form>
    </section>

    <script>
        var stripe = Stripe('{{ env('STRIPE_PUBLIC') }}'); // Your public Stripe key
        var elements = stripe.elements();
        var card = elements.create('card');
        card.mount('#card-element'); // Mount the card element to the div

        // Handle form submission
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Otherwise, send the token to your server
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the token to the backend (Laravel)
        function stripeTokenHandler(token) {
            var form = document.getElementById('payment-form');

            // Create a hidden input to store the token
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'card_token');
            hiddenInput.setAttribute('value', token.id);

            form.appendChild(hiddenInput);

            // Submit the form to the backend
            form.submit();
        }
    </script>
@endsection

