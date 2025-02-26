<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate form data
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'nullable|string|max:15',
            'message' => 'required|string',
        ]);

        // Save data to database
        Contact::create([
            'Name' => $request->name,
            'Email' => $request->email,
            'Phone' => $request->phone,
            'Message' => $request->message,
        ]);

        return back()->with('success', 'Message sent and saved successfully!');
    }
    public function showUserMessages()
    {
        $contacts = Contact::where('Email', auth()->user()->email)->get();
        return view('messages', compact('contacts'));
    }

}


