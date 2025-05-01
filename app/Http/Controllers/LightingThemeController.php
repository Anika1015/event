<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LightingTheme;

class LightingThemeController extends Controller
{
    public function index()
    {
        $lightingThemes = LightingTheme::all();
        return view('lighting_themes.index', compact('lightingThemes'));
    }

    public function create()
    {
        return view('lighting_themes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('lighting_themes');
        }

        LightingTheme::create($data);
        return redirect()->route('lighting-themes.index')->with('success', 'Lighting theme added successfully.');
    }

    public function edit(LightingTheme $lightingTheme)
    {
        return view('lighting_themes.edit', compact('lightingTheme'));
    }

    public function update(Request $request, LightingTheme $lightingTheme)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('lighting_themes');
        }

        $lightingTheme->update($data);
        return redirect()->route('lighting-themes.index')->with('success', 'Lighting theme updated successfully.');
    }

    public function destroy($id)
    {
        $lighting = LightingTheme::findOrFail($id);

        $lighting->delete();

        return redirect()->route('events.manage', $lighting->event_id)
                         ->with('success', 'Lighting Theme deleted successfully.');
    }
}
