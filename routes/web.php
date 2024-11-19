<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\RoommateController;
use App\Http\Controllers\ReviewController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');


Route::get('/colleges/{id}', [CollegeController::class, 'show'])->name('colleges.show');


Auth::routes(['verify' => true]);


Route::get('/colleges/{college}/students', [CollegeController::class, 'students'])->name('colleges.students');

Route::get('/users/{user}', [CollegeController::class, 'showStudent'])->name('user.show');

Route::get('/student_image/{filename}', [ProfileController::class, 'getStudentImage'])->name('student.image');


Route::get('/recommend-roommates', [RoommateController::class, 'recommendRoommates'])->name('recommend.roommates');

// routes/web.php

Route::middleware(['auth'])->group(function () {
    Route::get('/roommate/request/{roommateId}', [RoommateController::class, 'applyToBeRoommate'])->name('roommate.apply');
    Route::get('/roommate/applications', [RoommateController::class, 'viewApplicationHistory'])->name('roommate.history');
});


Route::middleware('auth')->group(function () {
    Route::get('/roommate/applications/received', [RoommateController::class, 'viewReceivedApplications'])->name('roommate.received');
    Route::post('/roommate/application/{applicationId}/accept', [RoommateController::class, 'acceptApplication'])->name('roommate.accept');
    Route::delete('/roommate/application/{applicationId}/reject', [RoommateController::class, 'rejectApplication'])->name('roommate.reject');
});

Route::middleware('auth')->group(function () {
    Route::get('/roommate/applications/received', [RoommateController::class, 'viewReceivedApplications'])->name('roommate.received');
    Route::post('/roommate/application/{applicationId}/accept', [RoommateController::class, 'acceptApplication'])->name('roommate.accept');
    Route::delete('/roommate/application/{applicationId}/reject', [RoommateController::class, 'rejectApplication'])->name('roommate.reject');
    Route::get('/roommate/confirmed', [RoommateController::class, 'viewConfirmedRoommates'])->name('roommate.confirmed');
});


Route::delete('/roommate/remove/{applicationId}', [RoommateController::class, 'removeConfirmedRoommate'])->name('roommate.remove');

Route::post('/roommate/request/{roommateId}', [RoommateController::class, 'applyToBeRoommate'])->name('roommate.apply');


Route::delete('/applications/{id}', [RoommateController::class, 'destroy'])->name('applications.destroy');


Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


// Request to delete account
Route::get('/profile/request-delete', [ProfileController::class, 'requestDelete'])->name('profile.requestDelete');

// Show the form to verify deletion code
Route::get('/profile/verify-delete', [ProfileController::class, 'verifyDeleteForm'])->name('profile.verifyDeleteForm');

// Handle the verification code submission and delete account
Route::post('/profile/verify-delete', [ProfileController::class, 'verifyDelete'])->name('profile.verifyDelete');


use App\Http\Controllers\Auth\VerificationController;


Route::get('/email/verify', [VerificationController::class, 'showVerificationForm'])->name('verification.notice');
Route::post('/email/verify', [VerificationController::class, 'verify'])->name('verification.verify');




// Route to show the review form
Route::get('/reviews/create/{roommate}', [ReviewController::class, 'create'])->name('reviews.create');

// Route to store the review
Route::post('/reviews/store', [ReviewController::class, 'store'])->name('reviews.store');

Route::get('/roommates/confirmed_roommates', [RoommateController::class, 'confirmed'])->name('roommates.confirmed_roommates');


Route::get('/districts-by-state/{stateName}', function($stateName) {
    $state = \App\Models\State::where('name', $stateName)->first();
    if ($state) {
        return \App\Models\District::where('state_id', $state->id)->get();
    }
    return response()->json([]);
});


