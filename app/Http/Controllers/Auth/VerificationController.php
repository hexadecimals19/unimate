<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function showVerificationForm()
    {
        return view('auth.verify');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'verification_code' => 'required|string',
        ]);

        $user = User::where('verification_code', $request->verification_code)->first();

        if ($user) {
            $user->email_verified_at = now();
            $user->verification_code = null; // Clear the verification code
            $user->save();

            return redirect('/login')->with('message', 'Email verified successfully! You can now log in.');
        } else {
            return back()->withErrors(['verification_code' => 'Invalid verification code.']);
        }
    }

}
