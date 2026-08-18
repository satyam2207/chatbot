<?php

namespace App\Http\Controllers;

use App\Models\Faculty;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = Faculty::where('is_active', true)
            ->with('department')
            ->get();

        return view('faculty', compact('faculties'));
    }
}
