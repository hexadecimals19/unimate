@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-5">
            <div class="row g-5">
                <!-- Left Column for Profile Image -->
                <div class="col-md-4 text-center">
                    @if ($student->studentimage)
                        <div class="mb-4">
                            <img src="{{ route('student.image', ['filename' => basename($student->studentimage)]) }}" alt="Student Image" class="img-thumbnail rounded-circle shadow-sm" width="150">
                        </div>
                    @else
                        <div class="mb-4">
                            <i class="bi bi-person-circle fs-1 text-muted"></i>
                            <p class="mt-2 text-muted">No student image available</p>
                        </div>
                    @endif
                </div>

                <!-- Right Column for Basic Information -->
                <div class="col-md-8">
                    <h2 class="fw-bold">{{ $student->name }}</h2>
                    <p><strong>Student ID:</strong> {{ $student->studentid }}</p>
                    <p><strong>Email:</strong> <a href="mailto:{{ $student->studentemail }}" class="text-decoration-none">{{ $student->studentemail }}</a></p>
                    <p><strong>College:</strong> {{ $student->studentcollege }}</p>
                    <p><strong>Gender:</strong> {{ $student->studentgender }}</p>
                </div>
            </div>

            @if ($student->profile)
                <hr class="my-5">
                <div class="row g-5">
                    <!-- Profile Details Column -->
                    <div class="col-md-6">
                        <h4 class="fw-bold mb-3">Profile Details</h4>
                        <p><strong>Bio:</strong> {{ $student->profile->bio ?? 'No data available' }}</p>
                        <p><strong>State:</strong> {{ $student->profile->show_nationality ? ($student->profile->nationality ?? 'No data available') : 'Hidden by user' }}</p>
                        <p><strong>District or Town:</strong> {{ $student->profile->show_home ? ($student->profile->home ?? 'No data available') : 'Hidden by user' }}</p>
                        <p><strong>Age:</strong> {{ $student->profile->show_age ? ($student->profile->age ?? 'No data available') : 'Hidden by user' }}</p>
                        <p><strong>Date of Birth:</strong> {{ $student->profile->show_date_of_birth ? ($student->profile->date_of_birth ?? 'No data available') : 'Hidden by user' }}</p>
                    </div>
                </div>

                <hr class="my-5">

                <div class="row g-5">
                    <!-- Interests Column -->
                    <div class="col-md-4">
                        <h4 class="fw-bold mb-3">Interests</h4>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Interest 1:</strong> {{ $student->profile->interest1 ?? 'No data available' }}</li>
                            <li class="list-group-item"><strong>Interest 2:</strong> {{ $student->profile->interest2 ?? 'No data available' }}</li>
                            <li class="list-group-item"><strong>Interest 3:</strong> {{ $student->profile->interest3 ?? 'No data available' }}</li>
                        </ul>
                    </div>

                    <!-- Lifestyles Column -->
                    <div class="col-md-4">
                        <h4 class="fw-bold mb-3">Lifestyles</h4>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Lifestyle 1:</strong> {{ $student->profile->lifestyle1 ?? 'No data available' }}</li>
                            <li class="list-group-item"><strong>Lifestyle 2:</strong> {{ $student->profile->lifestyle2 ?? 'No data available' }}</li>
                            <li class="list-group-item"><strong>Lifestyle 3:</strong> {{ $student->profile->lifestyle3 ?? 'No data available' }}</li>
                        </ul>
                    </div>

                    <!-- Preferences Column -->
                    <div class="col-md-4">
                        <h4 class="fw-bold mb-3">Preferences</h4>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Preference 1:</strong> {{ $student->profile->pref1 ?? 'No data available' }}</li>
                            <li class="list-group-item"><strong>Preference 2:</strong> {{ $student->profile->pref2 ?? 'No data available' }}</li>
                            <li class="list-group-item"><strong>Preference 3:</strong> {{ $student->profile->pref3 ?? 'No data available' }}</li>
                            <li class="list-group-item"><strong>Preference 4:</strong> {{ $student->profile->pref4 ?? 'No data available' }}</li>
                            <li class="list-group-item"><strong>Preference 5:</strong> {{ $student->profile->pref5 ?? 'No data available' }}</li>
                        </ul>
                    </div>
                </div>
            @else
                <hr class="my-5">
                <h4 class="fw-bold">Profile Details</h4>
                <p class="text-muted">No profile information available.</p>
            @endif

            <!-- Reviews and Ratings Section -->
            <hr class="my-5">
            <h4 class="fw-bold mb-3">Reviews and Ratings</h4>
            @if ($student->reviewsReceived->isNotEmpty())
                @foreach ($student->reviewsReceived as $review)
                    <div class="mb-4">
                        <div class="card border-0 bg-light shadow-sm p-3">
                            <strong>Rating:</strong> <span class="badge bg-primary">{{ $review->rating }} / 5</span><br>
                            <strong>Review:</strong> {{ $review->review ?? 'No review provided' }}<br>
                            <small class="text-muted">Reviewed by: {{ $review->user->name }} on {{ $review->created_at->format('Y-m-d') }}</small>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-muted">No reviews available.</p>
            @endif

            <!-- Submit Roommate Request Button -->
            <div class="text-center mt-5">
                <form id="roommate-request-form" action="{{ route('roommate.apply', ['roommateId' => $student->id]) }}" method="POST">
                    @csrf
                    <button type="button" class="btn btn-primary btn-md px-4 py-2 shadow-sm" onclick="confirmRoommateRequest()">
                        <i class="bi bi-person-plus-fill me-2"></i>Submit as Roommate Request
                    </button>
                </form>
            </div>
        </div>
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
