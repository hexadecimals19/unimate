<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\College;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Retrieve all users (or filter students only)
        $users = User::where('role', 'user')->get();

        // Pass users to the view
        return view('admin.students.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.students.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $colleges = College::all(); // Fetch all colleges
        return view('admin.students.edit', compact('user', 'colleges'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'studentemail' => 'required|email|unique:users,studentemail,' . $user->id,
            'studentcollege' => 'nullable|string|max:255',
            'studentid' => 'nullable|string|max:255',
            'studentgender' => 'required|in:male,female',
        ]);

        // Update user attributes
        $user->update($request->all());

        return redirect()->route('admin.students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.students.index')->with('success', 'User deleted successfully.');
    }
}
