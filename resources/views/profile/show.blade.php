@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header text-center bg-primary text-white">
            <!-- Display Student Image -->
            @if ($user->studentimage)
                <div class="mb-3">
                    <img src="{{ route('student.image', ['filename' => basename($user->studentimage)]) }}" alt="Student Image" class="img-thumbnail rounded-circle shadow-sm" width="150">
                </div>
            @else
                <div class="mb-3">
                    <p>No student image available.</p>
                </div>
            @endif

            <!-- Display User Name -->
            <h2 class="mb-1">{{ $user->name }}'s Profile</h2>
            <p class="mb-0">Your Unimate Profile</p>
        </div>

        <div class="card-body">
            <!-- Basic User Information Section -->
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="text-primary"><i class="fas fa-info-circle"></i> Basic Information</h4>
                    <hr>
                    <p><strong>Email:</strong> {{ $user->studentemail }}</p>
                    <p><strong>Student ID:</strong> {{ $user->studentid }}</p>
                    <p><strong>College:</strong> {{ $user->studentcollege ?? 'No data available' }}</p>
                    <p><strong>Gender:</strong> {{ ucfirst($user->studentgender) ?? 'No data available' }}</p>
                </div>
            </div>

            @if ($user->profile)
                <!-- Profile Information Section -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="text-primary"><i class="fas fa-user"></i> Profile Details</h4>
                        <hr>
                        <p><strong>Bio:</strong> {{ $user->profile->bio ?? 'No data available' }}</p>
                        <p><strong>State:</strong> {{ $user->profile->nationality ?? 'No data available' }}</p>
                        <p><strong>Town or District:</strong> {{ $user->profile->home ?? 'No data available' }}</p>
                        <p><strong>Age:</strong> {{ $user->profile->age ?? 'No data available' }}</p>
                        <p><strong>Date of Birth:</strong> {{ $user->profile->date_of_birth ? $user->profile->date_of_birth->format('d-m-Y') : 'No data available' }}</p>
                    </div>
                </div>
            @endif

            @if ($user->contact)
                <!-- Contact Information Section -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="text-primary"><i class="fas fa-phone"></i> Contact Information</h4>
                        <hr>
                        <p><strong>Phone Number:</strong> {{ $user->contact->phone_number ?? 'No data available' }}</p>
                        <p><strong>WhatsApp:</strong> {{ $user->contact->whatsapp ?? 'No data available' }}</p>
                        <p><strong>Telegram:</strong> {{ $user->contact->telegram ?? 'No data available' }}</p>
                        <p><strong>Facebook Profile:</strong>
                            @if ($user->contact->facebook_profile)
                                <a href="{{ $user->contact->facebook_profile }}" target="_blank">{{ $user->contact->facebook_profile }}</a>
                            @else
                                No data available
                            @endif
                        </p>
                        <p><strong>Twitter Profile:</strong>
                            @if ($user->contact->twitter_profile)
                                <a href="{{ $user->contact->twitter_profile }}" target="_blank">{{ $user->contact->twitter_profile }}</a>
                            @else
                                No data available
                            @endif
                        </p>
                        <p><strong>Instagram Profile:</strong>
                            @if ($user->contact->instagram_profile)
                                <a href="{{ $user->contact->instagram_profile }}" target="_blank">{{ $user->contact->instagram_profile }}</a>
                            @else
                                No data available
                            @endif
                        </p>
                    </div>
                </div>
            @endif

            @if ($user->profile)
                <!-- Additional Information Section -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4 class="text-primary"><i class="fas fa-heart"></i> Interests</h4>
                                <hr>
                                <ul class="list-unstyled">
                                    <li><strong>Interest 1:</strong> {{ $user->profile->interest1 ?? 'No data available' }}</li>
                                    <li><strong>Interest 2:</strong> {{ $user->profile->interest2 ?? 'No data available' }}</li>
                                    <li><strong>Interest 3:</strong> {{ $user->profile->interest3 ?? 'No data available' }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4 class="text-primary"><i class="fas fa-leaf"></i> Lifestyles</h4>
                                <hr>
                                <ul class="list-unstyled">
                                    <li><strong>Lifestyle 1:</strong> {{ $user->profile->lifestyle1 ?? 'No data available' }}</li>
                                    <li><strong>Lifestyle 2:</strong> {{ $user->profile->lifestyle2 ?? 'No data available' }}</li>
                                    <li><strong>Lifestyle 3:</strong> {{ $user->profile->lifestyle3 ?? 'No data available' }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4 class="text-primary"><i class="fas fa-cog"></i> Preferences</h4>
                                <hr>
                                <ul class="list-unstyled">
                                    <li><strong>Preference 1:</strong> {{ $user->profile->pref1 ?? 'No data available' }}</li>
                                    <li><strong>Preference 2:</strong> {{ $user->profile->pref2 ?? 'No data available' }}</li>
                                    <li><strong>Preference 3:</strong> {{ $user->profile->pref3 ?? 'No data available' }}</li>
                                    <li><strong>Preference 4:</strong> {{ $user->profile->pref4 ?? 'No data available' }}</li>
                                    <li><strong>Preference 5:</strong> {{ $user->profile->pref5 ?? 'No data available' }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-info">
                    <h4>No profile information available.</h4>
                </div>
            @endif

            <!-- Edit Profile Button -->
            <div class="text-center">
                <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-lg mt-3 shadow-sm">Edit Profile</a>
            </div>
        </div>
    </div>
</div>
@endsection
