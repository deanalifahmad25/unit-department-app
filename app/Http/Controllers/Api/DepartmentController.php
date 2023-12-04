<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index() {
        $departments = Department::with('unit')->withTrashed()->get();

        return response()->json($departments);
    }

    public function show() {
        $departments = Department::all();

        return view('dashboard.api.get_department_by_id', compact('departments'));
    }

    public function getDepartmentById($id) {
        $department = Department::with('unit')->find($id);

        if (!$department) {
            return response()->json(['message' => 'Department not found'], 404);
        }

        return response()->json($department);
    }

    public function search() {
        return view('dashboard.api.search_department');
    }

    public function searchDepartment(Request $request) {
        $keyword = $request->input('keyword');
        $departments = Department::where('name', 'like', '%' . $keyword . '%')->with('unit')->withTrashed()->get();

        return response()->json($departments);
    }
}
