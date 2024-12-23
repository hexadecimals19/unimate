<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Override the default email with studentemail for authentication.
     *
     * @return string
     */
    public function username()
    {
        return 'studentemail';  // Use 'studentemail' instead of 'email'
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'admin') {
            // Redirect to the admin dashboard if the user is an admin
            return redirect()->route('admin.dashboard');
        }

        // Redirect normal users to the home route
        return redirect()->route('home');
    }


    protected function credentials(Request $request)
{
    return [
        'studentemail' => $request->get('studentemail'),
        'password' => $request->get('password'),
    ];
}

}






