<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RoommateApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoommateController extends Controller
{
    public function recommendRoommates()
    {
        // Get the current logged-in user
        $user = auth()->user();

        // Get all users except the current one
        $potentialRoommates = User::where('id', '!=', $user->id)->with('profile')->get();

        $recommendedRoommates = [];

        foreach ($potentialRoommates as $potentialRoommate) {
            // Calculate matching score and get matching details
            list($score, $details) = $this->calculateMatchingScore($user, $potentialRoommate);

            // Add the user, their score, and details to the recommended list
            if ($score > 0) { // Only add if score is greater than 0
                $recommendedRoommates[] = [
                    'user' => $potentialRoommate,
                    'score' => $score,
                    'details' => $details,
                ];
            }
        }

        // Sort roommates by highest score
        usort($recommendedRoommates, function ($a, $b) {
            return $b['score'] - $a['score'];
        });

        // Get only the top recommended roommates (e.g., top 5)
        $recommendedRoommates = array_slice($recommendedRoommates, 0, 5);

        // Pass the recommended roommates to the view
        return view('roommates.recommended', compact('recommendedRoommates'));
    }

    private function calculateMatchingScore($user, $potentialRoommate)
    {
        $score = 0;
        $details = [
            'age_points' => 0,
            'nationality_points' => 0,
            'interests_points' => 0,
            'lifestyles_points' => 0,
            'preferences_points' => 0,
            'common_interests' => 0,
            'common_lifestyles' => 0,
            'common_preferences' => 0,
            'age' => false,
            'nationality' => false,
            'interests' => false,
            'lifestyles' => false,
            'preferences' => false
        ];

        // Ensure both users have a profile before calculating the score
        if (!$user->profile || !$potentialRoommate->profile) {
            return [$score, $details];
        }

        // Age difference (smaller difference gets higher score)
        if (!is_null($user->profile->age) && !is_null($potentialRoommate->profile->age)) {
            $ageDifference = abs($user->profile->age - $potentialRoommate->profile->age);
            if ($ageDifference <= 2) {
                $score += 10; // Small age difference
                $details['age_points'] = 10;
                $details['age'] = true;
            } elseif ($ageDifference <= 5) {
                $score += 5; // Moderate age difference
                $details['age_points'] = 5;
                $details['age'] = true;
            }
        }

        // Nationality match
        if (!is_null($user->profile->nationality) && $user->profile->nationality == $potentialRoommate->profile->nationality) {
            $score += 10; // Same nationality
            $details['nationality_points'] = 10;
            $details['nationality'] = true;
        }

        // Matching interests
        $interestsUser = array_filter([$user->profile->interest1, $user->profile->interest2, $user->profile->interest3]);
        $interestsRoommate = array_filter([$potentialRoommate->profile->interest1, $potentialRoommate->profile->interest2, $potentialRoommate->profile->interest3]);
        $commonInterests = array_intersect($interestsUser, $interestsRoommate);
        $interestsPoints = count($commonInterests) * 5; // Assign 5 points per common interest
        if ($interestsPoints > 0) {
            $score += $interestsPoints;
            $details['interests_points'] = $interestsPoints;
            $details['common_interests'] = count($commonInterests);
            $details['interests'] = true;
        }

        // Matching lifestyle
        $lifestylesUser = array_filter([$user->profile->lifestyle1, $user->profile->lifestyle2, $user->profile->lifestyle3]);
        $lifestylesRoommate = array_filter([$potentialRoommate->profile->lifestyle1, $potentialRoommate->profile->lifestyle2, $potentialRoommate->profile->lifestyle3]);
        $commonLifestyles = array_intersect($lifestylesUser, $lifestylesRoommate);
        $lifestylesPoints = count($commonLifestyles) * 5; // Assign 5 points per common lifestyle
        if ($lifestylesPoints > 0) {
            $score += $lifestylesPoints;
            $details['lifestyles_points'] = $lifestylesPoints;
            $details['common_lifestyles'] = count($commonLifestyles);
            $details['lifestyles'] = true;
        }

        // Matching preferences
        $preferencesUser = array_filter([$user->profile->pref1, $user->profile->pref2, $user->profile->pref3, $user->profile->pref4, $user->profile->pref5]);
        $preferencesRoommate = array_filter([$potentialRoommate->profile->pref1, $potentialRoommate->profile->pref2, $potentialRoommate->profile->pref3, $potentialRoommate->profile->pref4, $potentialRoommate->profile->pref5]);
        $commonPreferences = array_intersect($preferencesUser, $preferencesRoommate);
        $preferencesPoints = count($commonPreferences) * 3; // Assign 3 points per common preference
        if ($preferencesPoints > 0) {
            $score += $preferencesPoints;
            $details['preferences_points'] = $preferencesPoints;
            $details['common_preferences'] = count($commonPreferences);
            $details['preferences'] = true;
        }

        return [$score, $details];
    }

    public function applyToBeRoommate($roommateId)
    {
        $userId = Auth::id();

        // Prevent user from applying to themselves
        if ($userId == $roommateId) {
            return redirect()->back()->with('error', 'You cannot apply to be your own roommate.');
        }

        // Check if an application already exists
        $existingApplication = RoommateApplication::where('applicant_id', $userId)
            ->where('roommate_id', $roommateId)
            ->first();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'You have already applied to be this person\'s roommate.');
        }

        // Create a new application
        RoommateApplication::create([
            'applicant_id' => $userId,
            'roommate_id' => $roommateId,
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'Roommate request sent successfully.');
    }

    public function viewApplicationHistory()
    {
        $userId = Auth::id();
        $applications = RoommateApplication::where('applicant_id', $userId)
            ->with('roommate')
            ->get();

        return view('roommates.application_history', compact('applications'));
    }

    public function viewReceivedApplications()
    {
        $user = Auth::user();

        // Only show pending applications
        $applications = RoommateApplication::where('roommate_id', $user->id)
            ->where('status', 'pending')
            ->with('applicant')
            ->get();

        return view('roommates.received_applications', compact('applications'));
    }

    public function acceptApplication($applicationId)
    {
        $application = RoommateApplication::findOrFail($applicationId);

        if ($application->roommate_id !== Auth::id()) {
            return redirect()->route('roommate.received')->with('error', 'You are not authorized to accept this request.');
        }

        $application->update(['status' => 'accepted']);

        return redirect()->route('roommate.received')->with('success', 'Roommate request accepted successfully.');
    }

    public function rejectApplication($applicationId)
    {
        $application = RoommateApplication::findOrFail($applicationId);

        if ($application->roommate_id !== Auth::id()) {
            return redirect()->route('roommate.received')->with('error', 'You are not authorized to reject this request.');
        }

        $application->update(['status' => 'rejected']);

        return redirect()->route('roommate.received')->with('success', 'Roommate request rejected successfully.');
    }

    public function viewConfirmedRoommates()
    {
        $user = Auth::user();

        // Get all confirmed roommates (status = accepted)
        $confirmedRoommates = RoommateApplication::where(function ($query) use ($user) {
            $query->where('roommate_id', $user->id)
                  ->orWhere('applicant_id', $user->id);
        })->where('status', 'accepted')->with(['applicant', 'roommate'])->get();

        return view('roommates.confirmed_roommates', compact('confirmedRoommates'));
    }

    public function removeConfirmedRoommate($applicationId)
    {
        $application = RoommateApplication::findOrFail($applicationId);

        if (Auth::id() !== $application->applicant_id && Auth::id() !== $application->roommate_id) {
            return redirect()->route('roommate.confirmed')->with('error', 'You are not authorized to remove this roommate.');
        }

        $application->delete();

        return redirect()->route('roommate.confirmed')->with('success', 'Roommate removed successfully.');
    }
}
