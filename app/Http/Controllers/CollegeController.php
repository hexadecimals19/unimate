<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\College;
use App\Models\State; // Assuming you have a State model
use App\Models\District; // Assuming you have a District model
use Illuminate\Http\Request;

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

    // Show the students registered in a specific college with search functionality
    public function students(Request $request, $collegeId)
    {
        // Find the college by ID
        $college = College::findOrFail($collegeId);

        // Get the ID of the logged-in user
        $loggedInUserId = auth()->id();

        // Start with the base query for students associated with the college
        // and exclude the logged-in user
        $studentsQuery = User::where('studentcollege', $college->collegename)
            ->where('id', '!=', $loggedInUserId);

        // Apply the 'name' filter if it exists in the request
        if ($request->filled('name')) {
            $studentsQuery->where('name', 'LIKE', '%' . $request->input('name') . '%');
        }

        if ($request->filled('studentid')) {
            $studentsQuery->where('studentid', 'LIKE', '%' . $request->input('studentid') . '%');
        }

        if ($request->filled('studentemail')) {
            $studentsQuery->where('studentemail', 'LIKE', '%' . $request->input('studentemail') . '%');
        }

        // Apply the 'age' filter if it exists in the request
        if ($request->filled('age')) {
            $studentsQuery->whereHas('profile', function ($query) use ($request) {
                $query->where('age', $request->input('age'));
            });
        }

        // Apply the 'home' filter if it exists in the request
        if ($request->filled('home')) {
            $studentsQuery->whereHas('profile', function ($query) use ($request) {
                $query->where('home', 'LIKE', '%' . $request->input('home') . '%');
            });
        }

        // Apply the 'nationality' filter if it exists in the request
        if ($request->filled('nationality')) {
            $studentsQuery->whereHas('profile', function ($query) use ($request) {
                $query->where('nationality', 'LIKE', '%' . $request->input('nationality') . '%');
            });
        }

        // Apply the 'interest' filter if it exists in the request
        if ($request->filled('interest')) {
            $studentsQuery->whereHas('profile', function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('interest1', 'LIKE', '%' . $request->input('interest') . '%')
                      ->orWhere('interest2', 'LIKE', '%' . $request->input('interest') . '%')
                      ->orWhere('interest3', 'LIKE', '%' . $request->input('interest') . '%');
                });
            });
        }

        // Apply the 'lifestyle' filter if it exists in the request
        if ($request->filled('lifestyle')) {
            $studentsQuery->whereHas('profile', function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('lifestyle1', 'LIKE', '%' . $request->input('lifestyle') . '%')
                      ->orWhere('lifestyle2', 'LIKE', '%' . $request->input('lifestyle') . '%')
                      ->orWhere('lifestyle3', 'LIKE', '%' . $request->input('lifestyle') . '%');
                });
            });
        }

        // Apply the 'preference' filter if it exists in the request
        if ($request->filled('preference')) {
            $studentsQuery->whereHas('profile', function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('pref1', 'LIKE', '%' . $request->input('preference') . '%')
                      ->orWhere('pref2', 'LIKE', '%' . $request->input('preference') . '%')
                      ->orWhere('pref3', 'LIKE', '%' . $request->input('preference') . '%')
                      ->orWhere('pref4', 'LIKE', '%' . $request->input('preference') . '%')
                      ->orWhere('pref5', 'LIKE', '%' . $request->input('preference') . '%');
                });
            });
        }

        // Get the filtered results
        $students = $studentsQuery->get();

        // Retrieve the states and districts from the database
        $states = State::with('districts')->get();

        // Pass the results and states to the view
        return view('colleges.students', compact('college', 'students', 'states'));
    }

    // Store a new college
    public function store(Request $request)
    {
        $request->validate([
            'collegename' => 'required|string|max:255',
            'collegeimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
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

    // Show details of a specific student
    public function showStudent($userId)
    {
        // Find the user by ID and load their details
        $student = User::findOrFail($userId);

        // Pass the student details to the view
        return view('user.show', compact('student'));
    }
}
