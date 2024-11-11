@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <!-- Display Student Image -->
                    @if ($student->studentimage)
                        <div class="mb-4">
                            <img src="{{ route('student.image', ['filename' => basename($student->studentimage)]) }}" alt="Student Image" class="img-thumbnail rounded-circle" width="150">
                        </div>
                    @endif
                </div>
                <div class="col-md-8">
                    <!-- Basic User Information -->
                    <h2>{{ $student->name }}</h2>
                    <p><strong>Student ID:</strong> {{ $student->studentid }}</p>
                    <p><strong>Email:</strong> {{ $student->studentemail }}</p>
                    <p><strong>College:</strong> {{ $student->studentcollege }}</p>
                    <p><strong>Gender:</strong> {{ $student->studentgender }}</p>
                </div>
            </div>

            @if ($student->profile)
                <hr>
                <!-- Profile Information -->
                <div class="row">
                    <div class="col-md-6">
                        <h4>Profile Details</h4>
                        <p><strong>Bio:</strong> {{ $student->profile->bio ?? 'No data available' }}</p>
                        <p><strong>Nationality:</strong> {{ $student->profile->nationality ?? 'No data available' }}</p>
                        <p><strong>Home:</strong> {{ $student->profile->home ?? 'No data available' }}</p>
                        <p><strong>Age:</strong> {{ $student->profile->age ?? 'No data available' }}</p>
                    </div>

                    <div class="col-md-6">
                        <!-- Interests -->
                        <h4>Interests</h4>
                        <ul>
                            <li><strong>Interest 1:</strong> {{ $student->profile->interest1 ?? 'No data available' }}</li>
                            <li><strong>Interest 2:</strong> {{ $student->profile->interest2 ?? 'No data available' }}</li>
                            <li><strong>Interest 3:</strong> {{ $student->profile->interest3 ?? 'No data available' }}</li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <!-- Lifestyles -->
                        <h4>Lifestyles</h4>
                        <ul>
                            <li><strong>Lifestyle 1:</strong> {{ $student->profile->lifestyle1 ?? 'No data available' }}</li>
                            <li><strong>Lifestyle 2:</strong> {{ $student->profile->lifestyle2 ?? 'No data available' }}</li>
                            <li><strong>Lifestyle 3:</strong> {{ $student->profile->lifestyle3 ?? 'No data available' }}</li>
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <!-- Preferences -->
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

            <!-- Submit Roommate Request Button -->
            <div class="text-center mt-4">
                <form id="roommate-request-form" action="{{ route('roommate.apply', ['roommateId' => $student->id]) }}" method="POST">
                    @csrf
                    <button type="button" class="btn btn-primary" onclick="confirmRoommateRequest()">Submit as Roommate Request</button>
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
