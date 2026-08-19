<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Http\Request;

class AdminFacultyController extends Controller
{
    public function index()
    {
        $faculties = Faculty::with('department')->latest()->get();

        return view('admin.faculty', compact('faculties'));
    }

    public function create()
    {
        $departments = Department::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('admin.faculty-create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'designation' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        Faculty::create($validated);

        return redirect()
            ->route('admin.faculty')
            ->with('success', 'Faculty member created successfully.');
    }

    public function edit(Faculty $faculty)
    {
        $departments = Department::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('admin.faculty-edit', compact('faculty', 'departments'));
    }

    public function update(Request $request, Faculty $faculty)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'designation' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $faculty->update($validated);

        return redirect()
            ->route('admin.faculty')
            ->with('success', 'Faculty member updated successfully.');
    }

    public function destroy(Faculty $faculty)
    {
        $faculty->delete();

        return redirect()
            ->route('admin.faculty')
            ->with('success', 'Faculty member deleted successfully.');
    }
}