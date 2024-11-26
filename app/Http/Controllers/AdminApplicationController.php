<?php

namespace App\Http\Controllers;

use App\Models\RoommateApplication;
use Illuminate\Http\Request;

class AdminApplicationController extends Controller
{


    // Display the list of roommate applications
    public function index()
    {
        // Get all applications, including the applicant and roommate relationships
        $applications = RoommateApplication::with(['applicant', 'roommate'])->get();

        return view('admin.applications.index', compact('applications'));
    }

    // Show the details of a specific application
    public function show($id)
    {
        $application = RoommateApplication::findOrFail($id);

        // Get the applicant and roommate details
        $applicant = $application->applicant;  // Assuming `applicant` is the relation name in the RoommateApplication model
        $roommate = $application->roommate;    // Assuming `roommate` is the relation name in the RoommateApplication model

        return view('admin.applications.show', compact('application', 'applicant', 'roommate'));
    }


    // Delete an application
    public function destroy($id)
    {
        // Find the application by ID and delete it
        $application = RoommateApplication::findOrFail($id);
        $application->delete();

        return redirect()->route('admin.applications.index')->with('success', 'Application deleted successfully');
    }


}
