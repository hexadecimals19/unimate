<?php

// app/Http/Controllers/AdminReviewController.php
namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{


    // Display all reviews
    public function index()
    {
        // Retrieve all reviews, you can add pagination here if needed
        $reviews = Review::with('user', 'roommate')->get(); // Load related user and roommate data if needed
        return view('admin.reviews.index', compact('reviews'));
    }

    public function show($id)
    {
        // Find the review by ID
        $review = Review::with('user', 'roommate')->findOrFail($id);

        // Return the view for showing the review
        return view('admin.reviews.show', compact('review'));
    }

    // Delete a specific review
    public function destroy($id)
    {
        // Find the review by ID
        $review = Review::findOrFail($id);

        // Delete the review from the database
        $review->delete();

        // Redirect to the reviews index with a success message
        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully');
    }
}
