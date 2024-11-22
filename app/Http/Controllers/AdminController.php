<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\College;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Assuming you are fetching the logged-in user's information
        $user = auth()->user();

        // Total counts
        $totalStudents = User::where('role', 'user')->count();
        $totalMaleStudents = User::where('role', 'user')->where('studentgender', 'male')->count();
        $totalFemaleStudents = User::where('role', 'user')->where('studentgender', 'female')->count();
        $totalColleges = College::count();

        // Pass these variables to the view
        return view('admin.dashboard', compact('user', 'totalStudents', 'totalMaleStudents', 'totalFemaleStudents', 'totalColleges'));
    }

}
