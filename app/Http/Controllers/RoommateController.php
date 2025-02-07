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
        $user = auth()->user();
        $potentialRoommates = User::where('id', '!=', $user->id)->with('profile')->get();

        $recommendedRoommates = [];

        foreach ($potentialRoommates as $potentialRoommate) {
            list($score, $details) = $this->calculateMatchingScore($user, $potentialRoommate);
            if ($score > 0) {
                $recommendedRoommates[] = [
                    'user' => $potentialRoommate,
                    'score' => $score,
                    'details' => $details,
                ];
            }
        }

        usort($recommendedRoommates, function ($a, $b) {
            return $b['score'] - $a['score'];
        });

        $recommendedRoommates = array_slice($recommendedRoommates, 0, 5);

        return view('roommates.recommended', compact('recommendedRoommates'));
    }

    private function calculateMatchingScore($user, $potentialRoommate)
{
    $score = 0;
    $details = [
        'age_points' => 0,
        'nationality_points' => 0,
        'state_points' => 0,
        'district_points' => 0,
        'interests_points' => 0,
        'lifestyles_points' => 0,
        'preferences_points' => 0,
        'common_interests' => 0,
        'common_lifestyles' => 0,
        'common_preferences' => 0,
        'age' => false,
        'nationality' => false,
        'state' => false,
        'district' => false,
        'interests' => false,
        'lifestyles' => false,
        'preferences' => false,
        'matching_interests' => [],
        'matching_lifestyles' => [],
        'matching_preferences' => [],
        'matching_age' => null, // Store the actual matching age
        'matching_state' => null, // Store the actual matching state
        'matching_district' => null, // Store the actual matching district
    ];

    if (!$user->profile || !$potentialRoommate->profile) {
        return [$score, $details];
    }

    // Age Matching
    if (!is_null($user->profile->age) && !is_null($potentialRoommate->profile->age)) {
        $ageDifference = abs($user->profile->age - $potentialRoommate->profile->age);
        if ($ageDifference <= 2) {
            $score += 10;
            $details['age_points'] = 10;
            $details['age'] = true;
            $details['matching_age'] = [
                'user_age' => $user->profile->age,
                'roommate_age' => $potentialRoommate->profile->age,
            ]; // Store the actual matching age
        } elseif ($ageDifference <= 5) {
            $score += 5;
            $details['age_points'] = 5;
            $details['age'] = true;
            $details['matching_age'] = [
                'user_age' => $user->profile->age,
                'roommate_age' => $potentialRoommate->profile->age,
            ]; // Store the actual matching age
        }
    }

    // State (nationality) matching
    if (!is_null($user->profile->nationality) && $user->profile->nationality == $potentialRoommate->profile->nationality) {
        $score += 10;
        $details['nationality_points'] = 10;
        $details['nationality'] = true;
        $details['matching_state'] = [
            'user_state' => $user->profile->nationality,
            'roommate_state' => $potentialRoommate->profile->nationality,
        ]; // Store the actual matching state
    }

    // District or Town matching
    if (!is_null($user->profile->home) && $user->profile->home == $potentialRoommate->profile->home) {
        $score += 5;
        $details['district_points'] = 5;
        $details['district'] = true;
        $details['matching_district'] = [
            'user_district' => $user->profile->home,
            'roommate_district' => $potentialRoommate->profile->home,
        ]; // Store the actual matching district
    }

    // Interests Matching
    $interestsUser = array_filter([$user->profile->interest1, $user->profile->interest2, $user->profile->interest3]);
    $interestsRoommate = array_filter([$potentialRoommate->profile->interest1, $potentialRoommate->profile->interest2, $potentialRoommate->profile->interest3]);
    $commonInterests = array_intersect($interestsUser, $interestsRoommate);
    $interestsPoints = count($commonInterests) * 5;

    if ($interestsPoints > 0) {
        $score += $interestsPoints;
        $details['interests_points'] = $interestsPoints;
        $details['common_interests'] = count($commonInterests);
        $details['interests'] = true;
        $details['matching_interests'] = array_values($commonInterests); // Store the matching interests
    }

    // Lifestyles Matching
    $lifestylesUser = array_filter([$user->profile->lifestyle1, $user->profile->lifestyle2, $user->profile->lifestyle3]);
    $lifestylesRoommate = array_filter([$potentialRoommate->profile->lifestyle1, $potentialRoommate->profile->lifestyle2, $potentialRoommate->profile->lifestyle3]);
    $commonLifestyles = array_intersect($lifestylesUser, $lifestylesRoommate);
    $lifestylesPoints = count($commonLifestyles) * 5;

    if ($lifestylesPoints > 0) {
        $score += $lifestylesPoints;
        $details['lifestyles_points'] = $lifestylesPoints;
        $details['common_lifestyles'] = count($commonLifestyles);
        $details['lifestyles'] = true;
        $details['matching_lifestyles'] = array_values($commonLifestyles); // Store the matching lifestyles
    }

    // Preferences Matching
    $preferencesUser = array_filter([$user->profile->pref1, $user->profile->pref2, $user->profile->pref3, $user->profile->pref4, $user->profile->pref5]);
    $preferencesRoommate = array_filter([$potentialRoommate->profile->pref1, $potentialRoommate->profile->pref2, $potentialRoommate->profile->pref3, $potentialRoommate->profile->pref4, $potentialRoommate->profile->pref5]);
    $commonPreferences = array_intersect($preferencesUser, $preferencesRoommate);
    $preferencesPoints = count($commonPreferences) * 3;

    if ($preferencesPoints > 0) {
        $score += $preferencesPoints;
        $details['preferences_points'] = $preferencesPoints;
        $details['common_preferences'] = count($commonPreferences);
        $details['preferences'] = true;
        $details['matching_preferences'] = array_values($commonPreferences); // Store the matching preferences
    }

    return [$score, $details];
}





    public function applyToBeRoommate($roommateId)
    {
        $userId = Auth::id();

        if ($userId == $roommateId) {
            return redirect()->back()->with('error', 'You cannot apply to be your own roommate.');
        }

        $existingApplication = RoommateApplication::where('applicant_id', $userId)
            ->where('roommate_id', $roommateId)
            ->first();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'You have already applied to be this person\'s roommate.');
        }

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

    // NEW FUNCTION: Delete Rejected Application
    public function destroy($applicationId)
    {
        $application = RoommateApplication::findOrFail($applicationId);

    // Check if the authenticated user owns the application
    if (Auth::id() !== $application->applicant_id) {
        return redirect()->route('roommate.history')->with('error', 'You are not authorized to delete this application.');
    }

    // Allow deletion if the application is rejected or if the roommate is null
    if ($application->status === 'rejected' || is_null($application->roommate)) {
        $application->delete();
        return redirect()->route('roommate.history')->with('success', 'Application removed successfully.');
    }

    return redirect()->route('roommate.history')->with('error', 'Only rejected applications or applications with missing roommates can be deleted.');
    }

    public function confirmed()
    {
        // Fetch confirmed roommates for the authenticated user
        $confirmedRoommates = RoommateApplication::where(function ($query) {
            $query->where('applicant_id', Auth::id())
                  ->orWhere('roommate_id', Auth::id());
        })->get();

        // Return the view with confirmed roommates
        return view('roommates.confirmed_roommates', compact('confirmedRoommates'));
    }
}
