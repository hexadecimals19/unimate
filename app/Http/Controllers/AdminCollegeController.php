<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;

class AdminCollegeController extends Controller
{
    public function index()
    {
        $colleges = College::all();
        return view('admin.colleges.index', compact('colleges'));
    }

    public function create()
    {
        return view('admin.colleges.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'collegename' => 'required|string|max:255',
            'collegeimage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'collegedesc' => 'required|string',
            'collegetype' => 'required|string',
        ]);

        // Handle file upload
// Example in store or update method
if ($request->hasFile('collegeimage')) {
    $imageName = $request->file('collegeimage')->getClientOriginalName();
    $request->file('collegeimage')->move(public_path('images'), $imageName);
    $validated['collegeimage'] = 'images/' . $imageName; // Save the relative path
}


        College::create($validated);
        return redirect()->route('admin.colleges.index')->with('success', 'College created successfully.');
    }

    public function edit($id)
    {
        $college = College::findOrFail($id);
        return view('admin.colleges.edit', compact('college'));
    }

    public function update(Request $request, $id)
    {
        $college = College::findOrFail($id);
        $validated = $request->validate([
            'collegename' => 'required|string|max:255',
            'collegeimage' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'collegedesc' => 'required|string',
            'collegetype' => 'required|string',
        ]);

        // Handle file upload
// Example in store or update method
if ($request->hasFile('collegeimage')) {
    $imageName = $request->file('collegeimage')->getClientOriginalName();
    $request->file('collegeimage')->move(public_path('images'), $imageName);
    $validated['collegeimage'] = 'images/' . $imageName; // Save the relative path
}


        $college->update($validated);
        return redirect()->route('admin.colleges.index')->with('success', 'College updated successfully.');
    }

    public function show($id)
    {
        $college = College::findOrFail($id);
        return view('admin.colleges.show', compact('college'));
    }

    public function destroy($id)
    {
        $college = College::findOrFail($id);
        $college->delete();
        return redirect()->route('admin.colleges.index')->with('success', 'College deleted successfully.');
    }
}
