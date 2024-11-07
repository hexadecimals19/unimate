<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\College; // Make sure this path matches where your model is located

class CollegeController extends Controller
{
    // Show details of a specific college
    public function show($id)
    {
        // Find the college by ID and load its details
        $college = College::findOrFail($id);

        // Pass the college details to the view
        return view('colleges.show', compact('college'));
    }

    // Show the students registered in a specific college
    public function students($collegeId)
    {
        // Find the college and get users associated with it by college ID
        $college = College::findOrFail($collegeId);
        $students = User::where('studentcollege', $college->collegename)->get();

        return view('colleges.students', compact('college', 'students'));
    }

    // Store a new college
    public function store(Request $request)
    {
        $request->validate([
            'collegename' => 'required|string|max:255',
            'collegeimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'collegedesc' => 'nullable|string',
        ]);

        $college = new College();
        $college->collegename = $request->collegename;
        $college->collegedesc = $request->collegedesc;

        if ($request->hasFile('collegeimage')) {
            $image = $request->file('collegeimage');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Save the file in the public/images directory
            $destinationPath = public_path('images');
            $image->move($destinationPath, $imageName);

            // Store relative path in the database
            $college->collegeimage = 'images/' . $imageName;
        }

        $college->save();

        return redirect()->route('colleges.index')->with('success', 'College created successfully.');
    }

    public function showStudent($userId)
{
    // Find the user by ID and load their details
    $student = User::findOrFail($userId);

    // Pass the student details to the view
    return view('user.show', compact('student'));
}
}
