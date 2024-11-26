<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\College;
use App\Models\Review;
use App\Models\RoommateApplication;
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

        // Additional counts
        $totalReviews = Review::count(); // Assuming you have a Review model
        $totalRoommateApplications = RoommateApplication::count(); // Assuming you have a RoommateApplication model

        // Pass these variables to the view
        return view('admin.dashboard', compact('user', 'totalStudents', 'totalMaleStudents', 'totalFemaleStudents', 'totalColleges', 'totalReviews', 'totalRoommateApplications'));
    }


}
