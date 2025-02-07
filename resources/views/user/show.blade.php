@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row g-3"> <!-- Reduced gap between rows -->
        <!-- Profile Image Card -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4 text-center">
                <div class="card-body">
                    @if ($student->studentimage)
                        <img src="{{ route('student.image', ['filename' => basename($student->studentimage)]) }}" alt="Student Image" class="img-thumbnail rounded-circle shadow-sm mb-3" width="150">
                    @else
                        <i class="bi bi-person-circle fs-1 text-muted mb-3"></i>
                        <p class="text-muted">No student image available</p>
                    @endif
                    <h3 class="fw-bold">{{ $student->name }}</h3>
                    <p class="text-muted">{{ $student->studentcollege }}</p>
                </div>
            </div>
        </div>

        <!-- Basic Information Card -->
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body">
                    <h4 class="fw-bold">Basic Information</h4>
                    <hr>
                    <p><strong>Student ID:</strong> {{ $student->studentid }}</p>
                    <p><strong>Email:</strong> <a href="mailto:{{ $student->studentemail }}" class="text-decoration-none">{{ $student->studentemail }}</a></p>
                    <p><strong>Gender:</strong> {{ ucfirst($student->studentgender) }}</p>
                </div>
            </div>
        </div>
    </div>

    @if ($student->profile)
        <!-- Profile Details Card -->
        <div class="card shadow-sm border-0 rounded-4 mt-3"> <!-- Reduced margin-top -->
            <div class="card-body">
                <h4 class="fw-bold">Profile Details</h4>
                <hr>
                <p><strong>Bio:</strong> {{ $student->profile->bio ?? 'No data available' }}</p>
                <p><strong>State:</strong> {{ $student->profile->show_nationality ? ($student->profile->nationality ?? 'No data available') : 'Hidden by user' }}</p>
                <p><strong>District or Town:</strong> {{ $student->profile->show_home ? ($student->profile->home ?? 'No data available') : 'Hidden by user' }}</p>
                <p><strong>Age:</strong> {{ $student->profile->show_age ? ($student->profile->age ?? 'No data available') : 'Hidden by user' }}</p>
                <p><strong>Date of Birth:</strong>
                    {{ $student->profile->show_date_of_birth ?
                        ($student->profile->date_of_birth ? \Carbon\Carbon::parse($student->profile->date_of_birth)->format('d-m-Y') : 'No data available')
                        : 'Hidden by user'
                    }}
                </p>

            </div>
        </div>

        <!-- Interests, Lifestyles, Preferences -->
        <div class="row g-3 mt-1"> <!-- Reduced gap -->
            <!-- Interests Card -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body">
                        <h4 class="fw-bold">Interests</h4>
                        <hr>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Interest 1:</strong> {{ $student->profile->interest1 ?? 'No data available' }}</li>
                            <li class="list-group-item"><strong>Interest 2:</strong> {{ $student->profile->interest2 ?? 'No data available' }}</li>
                            <li class="list-group-item"><strong>Interest 3:</strong> {{ $student->profile->interest3 ?? 'No data available' }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Lifestyles Card -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body">
                        <h4 class="fw-bold">Lifestyles</h4>
                        <hr>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Lifestyle 1:</strong> {{ $student->profile->lifestyle1 ?? 'No data available' }}</li>
                            <li class="list-group-item"><strong>Lifestyle 2:</strong> {{ $student->profile->lifestyle2 ?? 'No data available' }}</li>
                            <li class="list-group-item"><strong>Lifestyle 3:</strong> {{ $student->profile->lifestyle3 ?? 'No data available' }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Preferences Card -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body">
                        <h4 class="fw-bold">Preferences</h4>
                        <hr>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Preference 1:</strong> {{ $student->profile->pref1 ?? 'No data available' }}</li>
                            <li class="list-group-item"><strong>Preference 2:</strong> {{ $student->profile->pref2 ?? 'No data available' }}</li>
                            <li class="list-group-item"><strong>Preference 3:</strong> {{ $student->profile->pref3 ?? 'No data available' }}</li>
                            <li class="list-group-item"><strong>Preference 4:</strong> {{ $student->profile->pref4 ?? 'No data available' }}</li>
                            <li class="list-group-item"><strong>Preference 5:</strong> {{ $student->profile->pref5 ?? 'No data available' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Reviews Card -->
    <div class="card shadow-sm border-0 rounded-4 mt-4">
        <div class="card-body">
            <h4 class="fw-bold">Reviews and Ratings</h4>
            <hr>
            @if ($student->reviewsReceived->isNotEmpty())
                @foreach ($student->reviewsReceived as $review)
                    <div class="mb-3"> <!-- Reduced margin-bottom -->
                        <div class="card border-0 bg-light shadow-sm p-3">
                            <strong>Rating:</strong>
                            <div class="progress mb-3" style="height: 20px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{ ($review->rating / 5) * 100 }}%;" aria-valuenow="{{ $review->rating }}" aria-valuemin="0" aria-valuemax="5">
                                    {{ $review->rating }} / 5
                                </div>
                            </div>
                            <strong>Review:</strong> {{ $review->review ?? 'No review provided' }}<br>
                            <small class="text-muted">Reviewed by: {{ $review->user->name }} on {{ $review->created_at->format('Y-m-d') }}</small>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-muted">No reviews available.</p>
            @endif
        </div>
    </div>

    <!-- Roommate Request Button -->
    <div class="text-center mt-4"> <!-- Reduced margin-top -->
        <form id="roommate-request-form" action="{{ route('roommate.apply', ['roommateId' => $student->id]) }}" method="POST">
            @csrf
            <button type="button" class="btn btn-primary btn-md px-4 py-2 shadow-sm" onclick="confirmRoommateRequest()">
                <i class="bi bi-person-plus-fill me-2"></i>Submit as Roommate Request
            </button>
        </form>
    </div>
</div>

<script>
    function confirmRoommateRequest() {
        if (confirm('Are you sure you want to submit a roommate request?')) {
            document.getElementById('roommate-request-form').submit();
        }
    }
</script>
@endsection
