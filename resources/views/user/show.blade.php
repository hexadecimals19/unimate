@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <!-- Left Column for Profile Image -->
                <div class="col-md-4 text-center">
                    <!-- Display Student Image -->
                    @if ($student->studentimage)
                        <div class="mb-4">
                            <img src="{{ route('student.image', ['filename' => basename($student->studentimage)]) }}" alt="Student Image" class="img-thumbnail rounded-circle" width="150">
                        </div>
                    @else
                        <div class="mb-4">
                            <p>No student image available.</p>
                        </div>
                    @endif
                </div>

                <!-- Right Column for Basic Information -->
                <div class="col-md-8">
                    <h2>{{ $student->name }}</h2>
                    <p><strong>Student ID:</strong> {{ $student->studentid }}</p>
                    <p><strong>Email:</strong> {{ $student->studentemail }}</p>
                    <p><strong>College:</strong> {{ $student->studentcollege }}</p>
                    <p><strong>Gender:</strong> {{ $student->studentgender }}</p>
                </div>
            </div>

            @if ($student->profile)
                <hr>
                <div class="row">
                    <!-- Profile Details Column -->
                    <div class="col-md-6">
                        <h4>Profile Details</h4>
                        <p><strong>Bio:</strong> {{ $student->profile->bio ?? 'No data available' }}</p>
                        <p><strong>Nationality:</strong> {{ $student->profile->nationality ?? 'No data available' }}</p>
                        <p><strong>Home:</strong> {{ $student->profile->home ?? 'No data available' }}</p>
                        <p><strong>Age:</strong> {{ $student->profile->age ?? 'No data available' }}</p>
                    </div>

                    <!-- Interests Column -->
                    <div class="col-md-6">
                        <h4>Interests</h4>
                        <ul>
                            <li><strong>Interest 1:</strong> {{ $student->profile->interest1 ?? 'No data available' }}</li>
                            <li><strong>Interest 2:</strong> {{ $student->profile->interest2 ?? 'No data available' }}</li>
                            <li><strong>Interest 3:</strong> {{ $student->profile->interest3 ?? 'No data available' }}</li>
                        </ul>
                    </div>
                </div>

                <div class="row mt-3">
                    <!-- Lifestyles Column -->
                    <div class="col-md-6">
                        <h4>Lifestyles</h4>
                        <ul>
                            <li><strong>Lifestyle 1:</strong> {{ $student->profile->lifestyle1 ?? 'No data available' }}</li>
                            <li><strong>Lifestyle 2:</strong> {{ $student->profile->lifestyle2 ?? 'No data available' }}</li>
                            <li><strong>Lifestyle 3:</strong> {{ $student->profile->lifestyle3 ?? 'No data available' }}</li>
                        </ul>
                    </div>

                    <!-- Preferences Column -->
                    <div class="col-md-6">
                        <h4>Preferences</h4>
                        <ul>
                            <li><strong>Preference 1:</strong> {{ $student->profile->pref1 ?? 'No data available' }}</li>
                            <li><strong>Preference 2:</strong> {{ $student->profile->pref2 ?? 'No data available' }}</li>
                            <li><strong>Preference 3:</strong> {{ $student->profile->pref3 ?? 'No data available' }}</li>
                            <li><strong>Preference 4:</strong> {{ $student->profile->pref4 ?? 'No data available' }}</li>
                            <li><strong>Preference 5:</strong> {{ $student->profile->pref5 ?? 'No data available' }}</li>
                        </ul>
                    </div>
                </div>
            @else
                <hr>
                <h4>Profile Details</h4>
                <p>No profile information available.</p>
            @endif

            <!-- Reviews and Ratings Section -->
            <hr>
            <h4>Reviews and Ratings</h4>
            @if ($student->reviewsReceived->isNotEmpty())
                @foreach ($student->reviewsReceived as $review)
                    <div class="mb-3">
                        <strong>Rating:</strong> {{ $review->rating }} / 5<br>
                        <strong>Review:</strong> {{ $review->review ?? 'No review provided' }}<br>
                        <small class="text-muted">Reviewed by: {{ $review->user->name }} on {{ $review->created_at->format('Y-m-d') }}</small>
                    </div>
                    <hr>
                @endforeach
            @else
                <p>No reviews available.</p>
            @endif

            <!-- Submit Roommate Request Button -->
            <div class="text-center mt-4">
                <form id="roommate-request-form" action="{{ route('roommate.apply', ['roommateId' => $student->id]) }}" method="POST">
                    @csrf
                    <button type="button" class="btn btn-primary btn-lg" onclick="confirmRoommateRequest()">Submit as Roommate Request</button>
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
