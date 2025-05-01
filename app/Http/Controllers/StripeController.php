<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Booking;
use App\Models\Transaction;

class StripeController extends Controller
{
    public function index($booking_id)
    {
        $booking = Booking::with(['venue', 'dishPackage', 'lightingTheme'])->where('BookingID', $booking_id)->first();
    
        if (!$booking) {
            return redirect()->route('dashboard')->with('error', 'Booking not found.');
        }
    
        $total_price = $booking->amount;
    
        return view('stripe', compact('booking', 'total_price'));
    }
    
    public function charge(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
    
        try {
            if (!$request->has('stripeToken')) {
                return response()->json(['success' => false, 'message' => 'Missing payment token.'], 400);
            }
    
            $charge = Charge::create([
                'amount' => $request->amount, 
                'currency' => 'bdt',
                'source' => $request->stripeToken,
                'description' => 'Event Booking Payment',
            ]);
    
            if ($charge->status == 'succeeded') {
                $booking = Booking::where('BookingID', $request->booking_id)->first();
                
                if ($booking) {
                    $booking->status = 'paid';
                    $booking->save();

                    Transaction::create([
                        'booking_id'        => $booking->BookingID,
                        'transaction_id'    => $charge->id,
                        'amount'            => $request->amount, 
                        'currency'          => 'bdt',
                        'payment_status'    => 'succeeded',
                    ]);
    
                    $successUrl = url("/payment/success/{$booking->BookingID}");

    
                    return response()->json(['success' => true, 'redirect_url' => $successUrl]);
                } else {
                    return response()->json(['success' => false, 'message' => 'Booking not found.'], 404);
                }
            } else {
                return response()->json(['success' => false, 'message' => 'Payment failed.'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    

    
    


public function paymentSuccess($id)
{
    $booking = Booking::with(['venue', 'dishPackage', 'lightingTheme'])->findOrFail($id);

    return view('payment.success', compact('booking'));
}




       
}
