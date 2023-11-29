<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Department;


class DashboardController extends Controller
{
    public function index() {
        $units = Unit::all();
        $departments = Department::with('unit')->get();

        return view('dashboard.index', compact('units', 'departments'));
    }
}
