<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // Method to show the review form
    public function create($roommateId)
    {
        $roommate = User::findOrFail($roommateId);

        // Check if a review already exists
        $existingReview = Review::where('user_id', Auth::id())
                                ->where('roommate_id', $roommateId)
                                ->first();

        if ($existingReview) {
            return redirect()->route('roommates.confirmed_roommates')
                             ->with('warning', 'You have already written a review for this roommate.');
        }

        return view('reviews.create', compact('roommate'));
    }

    // Method to store the review
    public function store(Request $request)
    {
        $request->validate([
            'roommate_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
        ]);

        // Check if a review already exists
        $existingReview = Review::where('user_id', Auth::id())
                                ->where('roommate_id', $request->input('roommate_id'))
                                ->first();

        if ($existingReview) {
            return redirect()->route('roommates.confirmed_roommates')
                             ->with('warning', 'You have already written a review for this roommate.');
        }

        // Create the review
        Review::create([
            'user_id' => Auth::id(),
            'roommate_id' => $request->input('roommate_id'),
            'rating' => $request->input('rating'),
            'review' => $request->input('review'),
        ]);

        return redirect()->route('roommates.confirmed_roommates')->with('success', 'Your review has been submitted.');
    }
}


