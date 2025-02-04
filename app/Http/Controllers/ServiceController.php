<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all services from the database
        $services = Service::all();
        
        // Return the view with the services data
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created service in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'Name' => 'required|string|max:100',
            'Description' => 'nullable|string',
        ]);

        // Create a new service and save it to the database
        Service::create([
            'Name' => $request->input('Name'),
            'Description' => $request->input('Description'),
        ]);

        // Redirect back to the services index with a success message
        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    /**
     * Show the form for editing an existing service.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // Find the service by its ID
        $service = Service::findOrFail($id);
        
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified service in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'Name' => 'required|string|max:100',
            'Description' => 'nullable|string',
        ]);

        // Find the service by its ID
        $service = Service::findOrFail($id);
        
        // Update the service with the validated data
        $service->update([
            'Name' => $request->input('Name'),
            'Description' => $request->input('Description'),
        ]);

        // Redirect back to the services index with a success message
        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified service from the database.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Find the service by its ID and delete it
        $service = Service::findOrFail($id);
        $service->delete();

        // Redirect back to the services index with a success message
        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}
