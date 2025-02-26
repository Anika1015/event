<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Payment;
use Stripe\Stripe;
use Stripe\Charge;

use App\Models\EventRequest;



class PaymentController extends Controller
{
    /*
    public function showPaymentForm($id)
{
    $eventRequest = EventRequest::findOrFail($id);

    if ($eventRequest->status !== 'approved') {
        return redirect()->route('dashboard')->with('error', 'Your event request has not been approved.');
    }

    return view('payment.form', compact('eventRequest'));
}
*/
    public function showPaymentForm($id)
    {
        $event = Event::findOrFail($id);
        
        return view('payment.form', compact('event'));
    }
    /*

    public function processPayment(Request $request, $id)
    {
        $eventRequest = EventRequest::findOrFail($id);
    
        if ($eventRequest->status !== 'approved') {
            return redirect()->route('home')->with('error', 'Your event request has not been approved.');
        }
    
        Stripe::setApiKey(env('STRIPE_SECRET'));
    
        try {
            $charge = Charge::create([
                'amount' => $eventRequest->price * 100,
                'currency' => 'USD',
                'source' => $request->input('card_token'),
                'description' => 'Payment for ' . $eventRequest->event_name,
            ]);
    
            Payment::create([
                'event_id' => $eventRequest->id,
                'transaction_id' => $charge->id,
                'amount' => $eventRequest->price,
                'currency' => 'USD',
                'status' => 'successful',
                'payment_method' => 'card',
            ]);
    
            return redirect()->route('payment.success')->with('message', 'Payment Successful!');
        } catch (\Exception $e) {
            return back()->withErrors(['payment_error' => $e->getMessage()]);
        }
    }
        */
        public function processPayment(Request $request, $id)
        {
        $event = Event::findOrFail($id);
        $amount = $event->price * 100; // Convert to cents for Stripe
    
        Stripe::setApiKey(env('STRIPE_SECRET'));
    
        try {
            // Create the charge
            $charge = Charge::create([
                'amount' => $amount,
                'currency' => 'USD',
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
    

    
    public function index()
    {
    $payments = Payment::with('event')->latest()->paginate(10);
    return view('admin.payments.index', compact('payments'));
    }

    public function show($id)
    {
    $payment = Payment::with('event')->findOrFail($id);
    return view('admin.payments.show', compact('payment'));
    }
  
}



    

