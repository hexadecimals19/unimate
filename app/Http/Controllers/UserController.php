<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\College;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all colleges for the dropdown
        $colleges = College::all();

        // Start with a base query
        $query = User::where('role', 'user');

        // Apply filters if available
        if ($request->filled('name')) {
            $query->where('name', 'LIKE', '%' . $request->input('name') . '%');
        }

        if ($request->filled('email')) {
            $query->where('studentemail', 'LIKE', '%' . $request->input('email') . '%');
        }

        if ($request->filled('studentid')) {
            $query->where('studentid', 'LIKE', '%' . $request->input('studentid') . '%');
        }

        if ($request->filled('college')) {
            $query->where('studentcollege', $request->input('college'));
        }

        if ($request->filled('gender')) {
            $query->where('studentgender', $request->input('gender'));
        }

        // Get the filtered user list
        $users = $query->get();

        // Return view with users and colleges
        return view('admin.students.index', compact('users', 'colleges'));
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
