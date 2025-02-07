@extends('layouts.app')

@section('content')
<div class="container mt-5 custom-container">
    <div class="row g-4 align-items-stretch">
        <!-- Profile Card -->
        <div class="col-lg-4 d-flex flex-column">
            <!-- Profile Image Card -->
            <div class="card shadow-sm border-0 text-center mb-4 flex-grow-1">
                <div class="card-body">
                    <!-- Profile Image -->
                    <div class="mb-3">
                        @if ($user->studentimage)
                            <img src="{{ route('student.image', ['filename' => basename($user->studentimage)]) }}" alt="Student Image" class="img-thumbnail rounded-circle shadow-sm" width="150">
                        @else
                            <img src="https://via.placeholder.com/150" alt="Default Image" class="img-thumbnail rounded-circle shadow-sm" width="150">
                        @endif
                    </div>

                    <!-- User Info -->
                    <h4 class="fw-bold">{{ $user->name }}</h4>
                    <p class="fw-bold">Your Unimate Profile</p>

    <!-- Informative Message -->
    <div class="card bg-light p-2 mb-3">
        <p class="text-danger small m-0">Keep your profile updated to ensure accurate information for the performance of the system.</p>
    </div>

<!-- Informative Message -->
<div class="card bg-warning p-2 mb-3">
    <p class="text-dark small m-0">
        Please ensure that your college is set correctly for matching with other users. For example, if your college is set to "Melati", you will only be matched with users who have "Melati" as their registered college.
    </p>
</div>



                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-sm">Edit Profile</a>
                    </div>
                </div>
            </div>

            <!-- Preferences Card -->
            @if ($user->profile)
            <div class="card shadow-sm border-0 flex-grow-1">
                <div class="card-body">
                    <h5 class="fw-bold"><i class="fas fa-cog"></i> Preferences</h5>
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
            @endif
        </div>

        <!-- Main Profile Information Section -->
        <div class="col-lg-8">
            <div class="row g-4 align-items-stretch">
                <!-- Basic Information -->
                <div class="col-12">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <h5 class="fw-bold"><i class="fas fa-info-circle"></i> Basic Information</h5>
                            <hr>
                            <p><strong>Email:</strong> {{ $user->studentemail }}</p>
                            <p><strong>Student ID:</strong> {{ $user->studentid }}</p>
                            <p><strong>College:</strong> {{ $user->studentcollege ?? 'No data available' }}</p>
                            <p><strong>Gender:</strong> {{ ucfirst($user->studentgender) ?? 'No data available' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Profile Details -->
                @if ($user->profile)
                <div class="col-md-6">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <h5 class="fw-bold"><i class="fas fa-user"></i> Profile Details</h5>
                            <hr>
                            <p><strong>Bio:</strong> {{ $user->profile->bio ?? 'No data available' }}</p>
                            <p><strong>State:</strong> {{ $user->profile->nationality ?? 'No data available' }}</p>
                            <p><strong>Town or District:</strong> {{ $user->profile->home ?? 'No data available' }}</p>
                            <p><strong>Age:</strong> {{ $user->profile->age ?? 'No data available' }}</p>
                            <p><strong>Date of Birth:</strong> {{ $user->profile->date_of_birth ? $user->profile->date_of_birth->format('d-m-Y') : 'No data available' }}</p>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Contact Information -->
                @if ($user->contact)
                <div class="col-md-6">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <h5 class="fw-bold"><i class="fas fa-phone"></i> Contact Information</h5>
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
                </div>
                @endif

                <!-- Interests -->
                @if ($user->profile)
                <div class="col-md-6">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <h5 class="fw-bold"><i class="fas fa-heart"></i> Interests</h5>
                            <hr>
                            <ul class="list-unstyled">
                                <li><strong>Interest 1:</strong> {{ $user->profile->interest1 ?? 'No data available' }}</li>
                                <li><strong>Interest 2:</strong> {{ $user->profile->interest2 ?? 'No data available' }}</li>
                                <li><strong>Interest 3:</strong> {{ $user->profile->interest3 ?? 'No data available' }}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Lifestyle -->
                <div class="col-md-6">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <h5 class="fw-bold"><i class="fas fa-leaf"></i> Lifestyle</h5>
                            <hr>
                            <ul class="list-unstyled">
                                <li><strong>Lifestyle 1:</strong> {{ $user->profile->lifestyle1 ?? 'No data available' }}</li>
                                <li><strong>Lifestyle 2:</strong> {{ $user->profile->lifestyle2 ?? 'No data available' }}</li>
                                <li><strong>Lifestyle 3:</strong> {{ $user->profile->lifestyle3 ?? 'No data available' }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
