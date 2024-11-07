@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header text-center">
            <!-- Display Student Image -->
            @if ($user->studentimage)
                <div class="mb-4">
                    <img src="{{ route('student.image', ['filename' => basename($user->studentimage)]) }}" alt="Student Image" class="img-thumbnail rounded-circle" width="150">
                </div>
            @else
                <div class="mb-4">
                    <p>No student image available.</p>
                </div>
            @endif

            <!-- Display User Name -->
            <h1 class="mb-0">{{ $user->name }}'s Profile</h1>
        </div>

        <div class="card-body">
            <!-- Basic User Information -->
            <p class="lead">Student Email: <strong>{{ $user->studentemail }}</strong></p>
            <p class="lead">Student ID: <strong>{{ $user->studentid }}</strong></p>
            <p class="lead">Student College: <strong>{{ $user->studentcollege ?? 'No data available' }}</strong></p>
            <p class="lead">Student Gender: <strong>{{ $user->studentgender ?? 'No data available' }}</strong></p>

            <!-- Profile Information -->
            @if ($user->profile)
                <hr>
                <h3>Profile Details</h3>
                <p class="lead">Bio: <strong>{{ $user->profile->bio ?? 'No data available' }}</strong></p>
                <p class="lead">Nationality: <strong>{{ $user->profile->nationality ?? 'No data available' }}</strong></p>
                <p class="lead">Home: <strong>{{ $user->profile->home ?? 'No data available' }}</strong></p>
                <p class="lead">Age: <strong>{{ $user->profile->age ?? 'No data available' }}</strong></p>

                <!-- Interests -->
                <h4>Interests</h4>
                <p class="lead">Interest 1: <strong>{{ $user->profile->interest1 ?? 'No data available' }}</strong></p>
                <p class="lead">Interest 2: <strong>{{ $user->profile->interest2 ?? 'No data available' }}</strong></p>
                <p class="lead">Interest 3: <strong>{{ $user->profile->interest3 ?? 'No data available' }}</strong></p>

                <!-- Lifestyles -->
                <h4>Lifestyles</h4>
                <p class="lead">Lifestyle 1: <strong>{{ $user->profile->lifestyle1 ?? 'No data available' }}</strong></p>
                <p class="lead">Lifestyle 2: <strong>{{ $user->profile->lifestyle2 ?? 'No data available' }}</strong></p>
                <p class="lead">Lifestyle 3: <strong>{{ $user->profile->lifestyle3 ?? 'No data available' }}</strong></p>

                <!-- Preferences -->
                <h4>Preferences</h4>
                <p class="lead">Preference 1: <strong>{{ $user->profile->pref1 ?? 'No data available' }}</strong></p>
                <p class="lead">Preference 2: <strong>{{ $user->profile->pref2 ?? 'No data available' }}</strong></p>
                <p class="lead">Preference 3: <strong>{{ $user->profile->pref3 ?? 'No data available' }}</strong></p>
                <p class="lead">Preference 4: <strong>{{ $user->profile->pref4 ?? 'No data available' }}</strong></p>
                <p class="lead">Preference 5: <strong>{{ $user->profile->pref5 ?? 'No data available' }}</strong></p>
            @else
                <hr>
                <h3>Profile Details</h3>
                <p>No profile information available.</p>
            @endif

            <!-- Edit Profile Button -->
            <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-lg mt-3">Edit Profile</a>
        </div>
    </div>
</div>
@endsection
