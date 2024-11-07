<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CollegeController;

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



