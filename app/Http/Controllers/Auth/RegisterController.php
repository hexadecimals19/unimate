<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'studentemail' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'studentid' => ['required', 'string', 'min:10'],
            'studentgender' => ['required', 'string', 'in:male,female,other'],
        ]);
    }

    protected function create(array $data)
{
    $verificationCode = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT); // Generate a 6-digit numeric verification code

    $user = User::create([
        'name' => $data['name'],
        'studentemail' => $data['studentemail'],
        'password' => Hash::make($data['password']),
        'studentid' => $data['studentid'],
        'studentgender' => $data['studentgender'],
        'verification_code' => $verificationCode, // Save the verification code
    ]);

    // Send verification code to the user's email
    Mail::raw("Your verification code is: $verificationCode", function ($message) use ($data) {
        $message->to($data['studentemail'])
            ->subject('Unimate Registration System: Email Verification Code');
    });

    event(new Registered($user));

    return $user;
}

}
