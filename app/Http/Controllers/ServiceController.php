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
        
        $services = Service::all();
        
        
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
       
        $request->validate([
            'Name' => 'required|string|max:100',
            'Description' => 'nullable|string',
        ]);

        
        Service::create([
            'Name' => $request->input('Name'),
            'Description' => $request->input('Description'),
        ]);

        
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
        
        $request->validate([
            'Name' => 'required|string|max:100',
            'Description' => 'nullable|string',
        ]);

       
        $service = Service::findOrFail($id);
        
       
        $service->update([
            'Name' => $request->input('Name'),
            'Description' => $request->input('Description'),
        ]);

       
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
        
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}
