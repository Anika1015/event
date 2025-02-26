<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Contact;
use App\Models\Payment;
use App\Models\EventRequest;


class AdminController extends Controller
{
    public function usercheck()
    {
        // Fetch total users
        $totalUsers = User::where('is_admin', 'user')->count();

        // Fetch total contact messages
        $totalContacts = Contact::count();

        // Fetch pending requests
        $pendingRequests = Contact::where('status', 'pending')->count();

        // Fetch latest 5 messages
        $contacts = Contact::latest()->take(5)->get();

        $totalIncome = Payment::sum('amount');

        return view('admin.dashboard', compact('totalUsers', 'totalContacts', 'pendingRequests', 'contacts', 'totalIncome'));
    }
    public function updateContactStatus(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->status = $request->status;
        if ($contact->status == 'resolved') {
            $contact->reply = $request->input('reply');
        }
        $contact->save();

        return redirect()->back()->with('success', 'Contact status updated successfully!');
    }   
    public function eventRequests()
    {
        $requests = EventRequest::all();
        return view('admin.requests', compact('requests'));
    }

    public function approve($id)
    {
        $request = EventRequest::findOrFail($id);
        $request->status = 'approved';
        $request->save();

        return redirect()->route('admin.requests')->with('success', 'Event request approved.');
    }

    public function reject($id)
    {
        $request = EventRequest::findOrFail($id);
        $request->status = 'rejected';
        $request->save();

        return redirect()->route('admin.requests')->with('success', 'Event request rejected.');
    }
}
