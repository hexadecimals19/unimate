<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Models\College;
use App\Models\State;
use App\Models\Profile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    // Show the user's profile
    public function show()
    {
        $user = Auth::user(); // Get the authenticated user

        // Load the user's profile and reviews
        $user->load('profile', 'reviewsReceived');

        return view('profile.show', compact('user')); // Return the 'profile.show' view with user data
    }

    // Show the edit form
    public function edit()
    {
        $user = Auth::user(); // Get the authenticated user
        $colleges = College::all(); // Get all colleges
        $states = State::all(); // Get all states for dropdown

        return view('profile.edit', compact('user', 'colleges', 'states')); // Pass user, colleges, and states data to view
    }

    // Update the user's profile
    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'studentemail' => 'required|email',
            'studentid' => 'required',
            'studentgender' => 'required',
            'studentcollege' => 'required',
            'studentimage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable|string',
            'nationality' => 'nullable|string',
            'home' => 'nullable|string',
            'age' => 'nullable|integer',
            'date_of_birth' => 'nullable|date',
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
            'show_nationality' => 'sometimes|boolean',
            'show_home' => 'sometimes|boolean',
            'show_age' => 'sometimes|boolean',
            'show_date_of_birth' => 'sometimes|boolean',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Handle file upload
        if ($request->hasFile('studentimage')) {
            // Delete the old image if it exists
            if ($user->studentimage) {
                $oldImagePath = storage_path('app/private/public/student_images/' . basename($user->studentimage));
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            // Store the new image in the specific directory
            $image = $request->file('studentimage');
            $destinationPath = storage_path('app/private/public/student_images');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);

            // Update the user's studentimage path
            $user->studentimage = 'private/public/student_images/' . $imageName;
        }

        // Update user details
        $user->name = $request->name;  // Update user's name
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
                'date_of_birth' => $request->date_of_birth,
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
                'show_nationality' => $request->has('show_nationality') ? $request->input('show_nationality') : false,
                'show_home' => $request->has('show_home') ? $request->input('show_home') : false,
                'show_age' => $request->has('show_age') ? $request->input('show_age') : false,
                'show_date_of_birth' => $request->has('show_date_of_birth') ? $request->input('show_date_of_birth') : false,
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

    // Request to delete account: Generate and send verification code
    public function requestDelete()
    {
        $user = Auth::user(); // Get the authenticated user

        // Generate a random 6-digit verification code
        $verificationCode = random_int(100000, 999999);

        // Store the code in the session temporarily
        Session::put('delete_verification_code', $verificationCode);

        // Send the verification code to the user's email
        Mail::send('emails.delete_verification', ['code' => $verificationCode], function ($message) use ($user) {
            $message->to($user->studentemail);
            $message->subject('UniMate Deletion System: Account Deletion Verification Code');
        });

        // Redirect to the verification form
        return redirect()->route('profile.verifyDeleteForm')->with('success', 'A verification code has been sent to your email. Please enter the code to proceed with account deletion.');
    }

    // Show the form to verify the deletion code
    public function verifyDeleteForm()
    {
        return view('profile.verify_delete');
    }

    // Handle the verification and delete the account
    public function verifyDelete(Request $request)
    {
        $request->validate([
            'verification_code' => 'required|integer',
        ]);

        $user = Auth::user();
        $storedCode = Session::get('delete_verification_code');

        if ($storedCode && $storedCode == $request->verification_code) {
            // Delete the user's image if it exists
            if ($user->studentimage) {
                $oldImagePath = storage_path('app/private/public/student_images/' . basename($user->studentimage));
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            // Delete the user's profile if exists
            if ($user->profile) {
                $user->profile->delete();
            }

            // Delete the user account
            $user->delete();

            // Redirect to the homepage with a success message
            return redirect('/')->with('success', 'Your account has been deleted successfully.');
        } else {
            return back()->withErrors(['verification_code' => 'The verification code is incorrect.']);
        }
    }
}
