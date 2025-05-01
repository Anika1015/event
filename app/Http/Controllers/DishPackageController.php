<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DishPackage;

class DishPackageController extends Controller
{
    public function index()
    {
        $dishPackages = DishPackage::all();
        return view('dish_packages.index', compact('dishPackages'));
    }

    public function create()
    {
        return view('dish_packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price_per_guest' => 'required|numeric',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('dish_packages');
        }

        DishPackage::create($data);
        return redirect()->route('dish-packages.index')->with('success', 'Dish package added successfully.');
    }

    public function edit(DishPackage $dishPackage)
    {
        return view('dish_packages.edit', compact('dishPackage'));
    }

    public function update(Request $request, DishPackage $dishPackage)
    {
        $request->validate([
            'name' => 'required',
            'price_per_guest' => 'required|numeric',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('dish_packages');
        }

        $dishPackage->update($data);
        return redirect()->route('dish-packages.index')->with('success', 'Dish package updated successfully.');
    }

    public function destroy($id)
    {
       
        $dish = DishPackage::findOrFail($id);

       
        $dish->delete();

       
        return redirect()->route('events.manage', $dish->event_id)
                         ->with('success', 'Dish Package deleted successfully.');
    }
}
