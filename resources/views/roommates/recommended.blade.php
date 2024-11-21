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
            @if ($roommate['user']->studentgender == auth()->user()->studentgender && $roommate['score'] > 0)
                <div class="col-lg-4 col-md-6 d-flex">
                    <div class="card border-0 shadow-sm rounded-4 w-100">
                        <div class="card-body p-4 text-center d-flex flex-column">
                            <!-- Profile Image -->
                            @if ($roommate['user']->studentimage)
                                <div class="mb-4">
                                    <img src="{{ route('student.image', ['filename' => basename($roommate['user']->studentimage)]) }}" alt="Student Image" class="img-thumbnail rounded-circle shadow-sm" style="width: 100px; height: 100px; object-fit: cover;">
                                </div>
                            @else
                                <div class="mb-4">
                                    <i class="bi bi-person-circle fs-1 text-muted"></i>
                                </div>
                            @endif

                            <!-- Student Name -->
                            <h5 class="card-title fw-bold mb-3">
                                <a href="{{ route('user.show', $roommate['user']->id) }}" class="text-decoration-none text-dark">{{ $roommate['user']->name }}</a>
                            </h5>

                            <!-- Score Badge -->
                            <span class="badge bg-primary mb-3 align-self-center" style="font-size: 0.8rem; padding: 5px 15px;">Score: {{ $roommate['score'] }}</span>

                            <!-- Matching Details -->
                            <p class="card-text text-muted mb-3">Matching Details:</p>
                            <ul class="list-unstyled text-start mb-4">
                                @if ($roommate['details']['age'])
                                    <li><i class="bi bi-award-fill me-2 text-primary"></i>Age: Similar ({{ $roommate['details']['age_points'] }} points)</li>
                                @endif
                                @if ($roommate['details']['nationality'])
                                    <li><i class="bi bi-globe me-2 text-primary"></i>State: Match ({{ $roommate['details']['nationality_points'] }} points)</li>
                                @endif
                                @if ($roommate['details']['district'])
                                    <li><i class="bi bi-geo-alt-fill me-2 text-primary"></i>District or Town: Match ({{ $roommate['details']['district_points'] }} points)</li>
                                @endif
                                @if ($roommate['details']['interests'])
                                    <li><i class="bi bi-heart-fill me-2 text-primary"></i>Interests: {{ $roommate['details']['common_interests'] }} common interests ({{ $roommate['details']['interests_points'] }} points)</li>
                                @endif
                                @if ($roommate['details']['lifestyles'])
                                    <li><i class="bi bi-activity me-2 text-primary"></i>Lifestyles: {{ $roommate['details']['common_lifestyles'] }} common lifestyles ({{ $roommate['details']['lifestyles_points'] }} points)</li>
                                @endif
                                @if ($roommate['details']['preferences'])
                                    <li><i class="bi bi-list-stars me-2 text-primary"></i>Preferences: {{ $roommate['details']['common_preferences'] }} common preferences ({{ $roommate['details']['preferences_points'] }} points)</li>
                                @endif
                            </ul>

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
