<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Payment;
use Stripe\Stripe;
use Stripe\Charge;


class PaymentController extends Controller
{
    public function showPaymentForm($id)
    {
        $event = Event::findOrFail($id);
        
        return view('payment.form', compact('event'));
    }

    public function processPayment(Request $request, $id)
{
    $event = Event::findOrFail($id);
    $amount = $event->price * 100; // Convert to cents for Stripe

    Stripe::setApiKey(env('STRIPE_SECRET'));

    try {
        // Create the charge
        $charge = Charge::create([
            'amount' => $amount,
            'currency' => 'usd',
            'source' => $request->input('card_token'),
            'description' => 'Payment for ' . $event->title,
            'metadata' => ['event_id' => $id],
        ]);

        // Store payment in the database
        Payment::create([
            'event_id' => $event->id,
            'transaction_id' => $charge->id,
            'amount' => $event->price,
            'currency' => 'USD',
            'status' => 'successful',
            'payment_method' => 'card',
        ]);

        \Log::info('Payment recorded in database', ['payment' => $charge]);

        return redirect()->route('payment.success')->with('message', 'Payment Successful!');
    } catch (\Exception $e) {
        \Log::error('Payment failed', ['error' => $e->getMessage()]);
        return back()->withErrors(['payment_error' => $e->getMessage()]);
    }
}
}



    

