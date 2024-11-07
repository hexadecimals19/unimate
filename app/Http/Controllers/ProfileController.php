<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\College;
use App\Models\Profile;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    // Show the user's profile
    public function show()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('profile.show', compact('user')); // Return the 'profile.show' view with user data
    }

    // Show the edit form
    public function edit()
    {
        $user = Auth::user(); // Get the authenticated user
        $colleges = College::all(); // Get all colleges
        return view('profile.edit', compact('user', 'colleges')); // Return the 'profile.edit' view with user and colleges data
    }

    // Update the user's profile
    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'studentemail' => 'required|email',
            'studentid' => 'required',
            'studentgender' => 'required',
            'studentcollege' => 'required',
            'studentimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation rule for image
            'bio' => 'nullable|string',
            'nationality' => 'nullable|string',
            'home' => 'nullable|string',
            'age' => 'nullable|integer',
            'interest1' => 'nullable|string',
            'interest2' => 'nullable|string',
            'interest3' => 'nullable|string',
            'lifestyle1' => 'nullable|string',
            'lifestyle2' => 'nullable|string',
            'lifestyle3' => 'nullable|string',
            'pref1' => 'nullable|string',
            'pref2' => 'nullable|string',
            'pref3' => 'nullable|string',
            'pref4' => 'nullable|string',
            'pref5' => 'nullable|string',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Handle file upload
        if ($request->hasFile('studentimage')) {
            // Delete the old image if it exists
            if ($user->studentimage) {
                Storage::delete($user->studentimage);
            }

            // Store the new image
            $path = $request->file('studentimage')->store('public/student_images');
            $user->studentimage = $path;
        }

        // Update user details
        $user->studentemail = $request->studentemail;
        $user->studentid = $request->studentid;
        $user->studentgender = $request->studentgender;
        $user->studentcollege = $request->studentcollege;
        $user->save(); // Save the changes

        // Update or create the profile details for the user
        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'bio' => $request->bio,
                'nationality' => $request->nationality,
                'home' => $request->home,
                'age' => $request->age,
                'interest1' => $request->interest1,
                'interest2' => $request->interest2,
                'interest3' => $request->interest3,
                'lifestyle1' => $request->lifestyle1,
                'lifestyle2' => $request->lifestyle2,
                'lifestyle3' => $request->lifestyle3,
                'pref1' => $request->pref1,
                'pref2' => $request->pref2,
                'pref3' => $request->pref3,
                'pref4' => $request->pref4,
                'pref5' => $request->pref5,
            ]
        );

        // Redirect to the profile page with a success message
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully');
    }

    // Method to get the student image by filename
    public function getStudentImage($filename)
    {
        $path = storage_path('app/private/public/student_images/' . $filename);

        if (!File::exists($path)) {
            return abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        return response($file, 200)->header('Content-Type', $type);
    }
}
