<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    public function index() {
        $units = Unit::with('departments')->withTrashed()->get();

        return response()->json($units);
    }

    public function show() {
        $units = Unit::all();

        return view('dashboard.api.get_unit_by_id', compact('units'));
    }

    public function getUnitById($id) {
        $unit = Unit::with('departments')->find($id);

        if (!$unit) {
            return response()->json(['message' => 'Unit not found'], 404);
        }

        return response()->json($unit);
    }

    public function search() {
        return view('dashboard.api.search_unit');
    }

    public function searchUnit(Request $request) {
        $keyword = $request->input('keyword');
        $units = Unit::where('name', 'like', '%' . $keyword . '%')->with('departments')->withTrashed()->get();

        return response()->json($units);
    }
}
