<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Unit;
use Str;

class DepartmentController extends Controller
{
    public function create() {
        $units = Unit::all();

        return view('dashboard.department.create', compact('units'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'unit_id' => ['required'],
        ]);

        $department = new Department([
            'id' => Str::uuid(),
            'name' => $data['name'],
            'unit_id' => $data['unit_id'],
            'slug' => Str::slug($data['name'])
        ]);

        $department->save();

        return redirect()->route('dashboard')->with('success', 'Department created successfully');
    }

    public function edit($slug) {
        $department = Department::where('slug', $slug)->firstOrFail();
        $units = Unit::all();

        return view('dashboard.department.edit', compact('department', 'units'));
    }

    public function update(Request $request, $slug) {
        $data = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'unit_id' => ['required'],
        ]);

        $department = Department::where('slug', $slug)->firstOrFail();

        $department->update([
            'name' => $data['name'],
            'unit_id' => $data['unit_id'],
            'slug' => Str::slug($data['name'])
        ]);

        return redirect()->route('dashboard')->with('success', 'Department updated successfully');
    }

    public function destroy($slug)
    {
        $department = Department::where('slug', $slug)->firstOrFail();

        $department->delete();

        return redirect()->route('dashboard')->with('success', 'Department deleted successfully');
    }
}
