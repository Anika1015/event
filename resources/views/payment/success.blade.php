@extends('layout.master')

@section('title', 'Payment Success')

@section('content')
    <header class="page-header">
        <h2>Payment Successful!</h2>
    </header>

    <section class="payment-success">
        <p>Thank you for your payment! Your booking has been confirmed.</p>
        <p>You will receive a confirmation email shortly.</p>
        <a href="{{ route('events.index') }}" class="btn-back-to-events">Back to Events</a>
    </section>
@endsection
