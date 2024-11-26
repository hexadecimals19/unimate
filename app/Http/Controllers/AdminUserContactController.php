<?php

namespace App\Http\Controllers;

use App\Models\UserContact;
use Illuminate\Http\Request;

class AdminUserContactController extends Controller
{

    public function index()
    {
        // Load user contact details along with related user information
        $contacts = UserContact::with('user')->get();
        return view('admin.usercontacts.index', compact('contacts'));
    }

    public function show($id)
    {
        // Fetch user contact with the user relationship for details
        $contact = UserContact::with('user')->findOrFail($id);
        return view('admin.usercontacts.show', compact('contact'));
    }

    public function destroy($id)
    {
        $contact = UserContact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.usercontacts.index')->with('success', 'User contact deleted successfully.');
    }
}

