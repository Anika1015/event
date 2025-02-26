@extends('layout.adminMaster')

@section('content')
<h2>Payment Details</h2>
<p><strong>Event:</strong> {{ $payment->event->title ?? 'N/A' }}</p>
<p><strong>Transaction ID:</strong> {{ $payment->transaction_id }}</p>
<p><strong>Amount:</strong> ${{ $payment->amount }}</p>
<p><strong>Currency:</strong> {{ $payment->currency }}</p>
<p><strong>Payment Method:</strong> {{ $payment->payment_method }}</p>
<p><strong>Status:</strong> {{ ucfirst($payment->status) }}</p>
<a href="{{ route('admin.payments.index') }}" class="btn btn-primary">Back to Payments</a>
@endsection
