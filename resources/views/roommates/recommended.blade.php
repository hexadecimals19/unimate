@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center fw-bold mb-5">Recommended Roommates</h2>

    @if(empty($recommendedRoommates))
        <div class="text-center mt-4">
            <p class="text-muted">No recommended roommates found based on your profile.</p>
        </div>
    @else
    <div class="row g-4">
        @foreach($recommendedRoommates as $roommate)
            @if ($roommate['user']->studentgender == auth()->user()->studentgender
            && $roommate['user']->studentcollege == auth()->user()->studentcollege
            && $roommate['score'] > 0)
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="card border-0 shadow-sm rounded-4 w-100">
                        <div class="card-body p-4 text-center d-flex flex-column">

                            <!-- Profile Image & Name -->
                            <div class="mb-4">
                                @if ($roommate['user']->studentimage)
                                    <img src="{{ route('student.image', ['filename' => basename($roommate['user']->studentimage)]) }}" alt="Student Image" class="img-thumbnail rounded-circle shadow-sm" style="width: 100px; height: 100px; object-fit: cover;">
                                @else
                                    <i class="bi bi-person-circle fs-1 text-muted"></i>
                                @endif
                            </div>

                            <!-- Student Name & Score -->
                            <h5 class="card-title fw-bold mb-3">
                                <a href="{{ route('user.show', $roommate['user']->id) }}" class="text-decoration-none text-dark">{{ $roommate['user']->name }}</a>
                            </h5>
                            <span class="badge bg-primary mb-3 align-self-center" style="font-size: 0.8rem; padding: 5px 15px;">
                                Score: {{ $roommate['score'] }}
                            </span>

                            <!-- Matching Details (Table Format) -->
                            <h6 class="fw-bold mb-3">Matching Details:</h6>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <!-- Age Match -->
                                    @if ($roommate['details']['age'])
                                        <tr>
                                            <td><strong>Age:</strong></td>
                                            <td>{{ auth()->user()->profile->age }} (You) - {{ $roommate['user']->profile->age }} (Roommate)</td>
                                            <td>{{ $roommate['details']['age_points'] }} points</td>
                                        </tr>
                                    @endif

                                    <!-- State (Nationality) Match -->
                                    @if ($roommate['details']['nationality'])
                                        <tr>
                                            <td><strong>State:</strong></td>
                                            <td>{{ auth()->user()->profile->nationality }} (You) - {{ $roommate['user']->profile->nationality }} (Roommate)</td>
                                            <td>{{ $roommate['details']['nationality_points'] }} points</td>
                                        </tr>
                                    @endif

                                    <!-- District or Town Match -->
                                    @if ($roommate['details']['district'])
                                        <tr>
                                            <td><strong>District or Town:</strong></td>
                                            <td>{{ auth()->user()->profile->home }} (You) - {{ $roommate['user']->profile->home }} (Roommate)</td>
                                            <td>{{ $roommate['details']['district_points'] }} points</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>

                            <!-- Specific Matches (Table Format) -->
                            <h6 class="fw-bold mb-3">Specific Matches:</h6>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <!-- Interests Match -->
                                    @if ($roommate['details']['interests'])
                                        <tr>
                                            <td><strong>Interests:</strong></td>
                                            <td>{{ $roommate['details']['common_interests'] }} common interests</td>
                                            <td>{{ $roommate['details']['interests_points'] }} points</td>
                                        </tr>
                                        @foreach($roommate['details']['matching_interests'] as $interest)
                                            <tr>
                                                <td></td>
                                                <td><i class="bi bi-heart me-2 text-primary"></i>{{ $interest }}</td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    <!-- Lifestyles Match -->
                                    @if ($roommate['details']['lifestyles'])
                                        <tr>
                                            <td><strong>Lifestyles:</strong></td>
                                            <td>{{ $roommate['details']['common_lifestyles'] }} common lifestyles</td>
                                            <td>{{ $roommate['details']['lifestyles_points'] }} points</td>
                                        </tr>
                                        @foreach($roommate['details']['matching_lifestyles'] as $lifestyle)
                                            <tr>
                                                <td></td>
                                                <td><i class="bi bi-activity me-2 text-primary"></i>{{ $lifestyle }}</td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    <!-- Preferences Match -->
                                    @if ($roommate['details']['preferences'])
                                        <tr>
                                            <td><strong>Preferences:</strong></td>
                                            <td>{{ $roommate['details']['common_preferences'] }} common preferences</td>
                                            <td>{{ $roommate['details']['preferences_points'] }} points</td>
                                        </tr>
                                        @foreach($roommate['details']['matching_preferences'] as $preference)
                                            <tr>
                                                <td></td>
                                                <td><i class="bi bi-list-stars me-2 text-primary"></i>{{ $preference }}</td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>

                            <!-- Student ID & Email -->
                            <div class="mt-auto">
                                <p class="card-text text-muted mb-1">
                                    <i class="bi bi-person-badge-fill me-2"></i>Student ID: {{ $roommate['user']->studentid }}
                                </p>
                                <p class="card-text text-muted">
                                    <i class="bi bi-envelope-fill me-2"></i><a href="mailto:{{ $roommate['user']->studentemail }}" class="text-decoration-none text-muted">{{ $roommate['user']->studentemail }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    @endif
</div>
@endsection
