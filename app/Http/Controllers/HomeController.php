<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard with optional search functionality and gender-based filtering.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Get the search query from the request
        $search = $request->input('search');

        // Determine the collegetype based on the user's gender
        $collegetype = null;
        if ($user->studentgender == 'male') {
            $collegetype = 1; // Male colleges
        } elseif ($user->studentgender == 'female') {
            $collegetype = 2; // Female colleges
        }

        // Filter the colleges based on search and collegetype
        $colleges = College::when($collegetype, function ($query, $collegetype) {
                return $query->where('collegetype', $collegetype);
            })
            ->when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('collegename', 'LIKE', "%{$search}%")
                          ->orWhere('collegedesc', 'LIKE', "%{$search}%");
                });
            })
            ->get();

        // Pass the colleges and search term back to the view
        return view('home', compact('colleges', 'search'));
    }
}
