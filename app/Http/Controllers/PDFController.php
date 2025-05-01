<?php

namespace App\Http\Controllers;
use PDF;
use App\Models\Booking;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function download($id)
    {
         
        $booking = Booking::with(['venue', 'dishPackage', 'lightingTheme'])->findOrFail($id);

         
        $transaction = Transaction::where('booking_id', $id)->latest()->first();

         
        $pdf = PDF::loadView('invoices.invoice', compact('booking', 'transaction'))->setPaper('A4', 'portrait');

        
        return $pdf->download('invoice_'.$booking->BookingID.'.pdf');
    }
}


