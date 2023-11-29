<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use Str;

class UnitController extends Controller
{
    public function create() {
        return view('dashboard.unit.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => ['required', 'max:255', 'string'],
        ]);

        $unit = new Unit([
            'id' => Str::uuid(),
            'name' => $data['name'],
            'slug' => Str::slug($data['name'])
        ]);

        $unit->save();

        return redirect()->route('dashboard')->with('success', 'Unit created successfully');
    }

    public function edit($slug) {
        $unit = Unit::where('slug', $slug)->firstOrFail();

        return view('dashboard.unit.edit', compact('unit'));
    }

    public function update(Request $request, $slug) {
        $data = $request->validate([
            'name' => ['required', 'max:255', 'string'],
        ]);

        $unit = Unit::where('slug', $slug)->firstOrFail();

        $unit->update([
            'name' => $data['name'],
            'slug' => Str::slug($data['name'])
        ]);

        return redirect()->route('dashboard')->with('success', 'Unit updated successfully');
    }

    public function destroy($slug)
    {
        $unit = Unit::where('slug', $slug)->firstOrFail();

        $unit->delete();

        return redirect()->route('dashboard')->with('success', 'Unit deleted successfully');
    }
}
