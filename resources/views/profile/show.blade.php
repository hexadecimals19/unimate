@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header text-center bg-light">
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
            <div class="row mb-4">
                <div class="col-md-6">
                    <!-- Basic User Information -->
                    <h4>Basic Information</h4>
                    <p><strong>Email:</strong> {{ $user->studentemail }}</p>
                    <p><strong>Student ID:</strong> {{ $user->studentid }}</p>
                    <p><strong>College:</strong> {{ $user->studentcollege ?? 'No data available' }}</p>
                    <p><strong>Gender:</strong> {{ $user->studentgender ?? 'No data available' }}</p>
                </div>

                @if ($user->profile)
                <div class="col-md-6">
                    <!-- Profile Information -->
                    <h4>Profile Details</h4>
                    <p><strong>Bio:</strong> {{ $user->profile->bio ?? 'No data available' }}</p>
                    <p><strong>Nationality:</strong> {{ $user->profile->nationality ?? 'No data available' }}</p>
                    <p><strong>Home:</strong> {{ $user->profile->home ?? 'No data available' }}</p>
                    <p><strong>Age:</strong> {{ $user->profile->age ?? 'No data available' }}</p>
                </div>
                @endif
            </div>

            @if ($user->profile)
                <hr>

                <div class="row mb-4">
                    <!-- Interests Column -->
                    <div class="col-md-6">
                        <h4>Interests</h4>
                        <ul>
                            <li><strong>Interest 1:</strong> {{ $user->profile->interest1 ?? 'No data available' }}</li>
                            <li><strong>Interest 2:</strong> {{ $user->profile->interest2 ?? 'No data available' }}</li>
                            <li><strong>Interest 3:</strong> {{ $user->profile->interest3 ?? 'No data available' }}</li>
                        </ul>
                    </div>

                    <!-- Lifestyles Column -->
                    <div class="col-md-6">
                        <h4>Lifestyles</h4>
                        <ul>
                            <li><strong>Lifestyle 1:</strong> {{ $user->profile->lifestyle1 ?? 'No data available' }}</li>
                            <li><strong>Lifestyle 2:</strong> {{ $user->profile->lifestyle2 ?? 'No data available' }}</li>
                            <li><strong>Lifestyle 3:</strong> {{ $user->profile->lifestyle3 ?? 'No data available' }}</li>
                        </ul>
                    </div>
                </div>

                <div class="row mb-4">
                    <!-- Preferences Column -->
                    <div class="col-md-12">
                        <h4>Preferences</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Preference 1:</strong> {{ $user->profile->pref1 ?? 'No data available' }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Preference 2:</strong> {{ $user->profile->pref2 ?? 'No data available' }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Preference 3:</strong> {{ $user->profile->pref3 ?? 'No data available' }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Preference 4:</strong> {{ $user->profile->pref4 ?? 'No data available' }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Preference 5:</strong> {{ $user->profile->pref5 ?? 'No data available' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h4>Profile Details</h4>
                        <p>No profile information available.</p>
                    </div>
                </div>
            @endif

            <!-- Edit Profile Button -->
            <div class="text-center">
                <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-lg mt-3">Edit Profile</a>
            </div>
        </div>
    </div>
</div>
@endsection
