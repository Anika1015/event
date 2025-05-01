<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
{
    $transactions = Transaction::with('booking.user', 'booking.venue', 'booking.lightingTheme', 'booking.dishPackage')
        ->latest()
        ->paginate(10);

    return view('transactions.index', compact('transactions'));
}
    
    
}
