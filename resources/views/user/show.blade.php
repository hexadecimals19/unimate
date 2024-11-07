@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-body text-center">

            <!-- Display Student Image -->
            @if ($student->studentimage)
                <div class="mb-4">
                    <img src="{{ route('student.image', ['filename' => basename($student->studentimage)]) }}" alt="Student Image" class="img-thumbnail rounded-circle" width="150">
                </div>
            @endif

            <!-- Basic User Information -->
            <h2>{{ $student->name }}</h2>
            <p><strong>Student ID:</strong> {{ $student->studentid }}</p>
            <p><strong>Email:</strong> {{ $student->studentemail }}</p>
            <p><strong>College:</strong> {{ $student->studentcollege }}</p>
            <p><strong>Gender:</strong> {{ $student->studentgender }}</p>

            <!-- Profile Information -->
            @if ($student->profile)
                <hr>
                <h3>Profile Details</h3>
                <p><strong>Bio:</strong> {{ $student->profile->bio ?? 'No data available' }}</p>
                <p><strong>Nationality:</strong> {{ $student->profile->nationality ?? 'No data available' }}</p>
                <p><strong>Home:</strong> {{ $student->profile->home ?? 'No data available' }}</p>
                <p><strong>Age:</strong> {{ $student->profile->age ?? 'No data available' }}</p>

                <!-- Interests -->
                <h4>Interests</h4>
                <p><strong>Interest 1:</strong> {{ $student->profile->interest1 ?? 'No data available' }}</p>
                <p><strong>Interest 2:</strong> {{ $student->profile->interest2 ?? 'No data available' }}</p>
                <p><strong>Interest 3:</strong> {{ $student->profile->interest3 ?? 'No data available' }}</p>

                <!-- Lifestyles -->
                <h4>Lifestyles</h4>
                <p><strong>Lifestyle 1:</strong> {{ $student->profile->lifestyle1 ?? 'No data available' }}</p>
                <p><strong>Lifestyle 2:</strong> {{ $student->profile->lifestyle2 ?? 'No data available' }}</p>
                <p><strong>Lifestyle 3:</strong> {{ $student->profile->lifestyle3 ?? 'No data available' }}</p>

                <!-- Preferences -->
                <h4>Preferences</h4>
                <p><strong>Preference 1:</strong> {{ $student->profile->pref1 ?? 'No data available' }}</p>
                <p><strong>Preference 2:</strong> {{ $student->profile->pref2 ?? 'No data available' }}</p>
                <p><strong>Preference 3:</strong> {{ $student->profile->pref3 ?? 'No data available' }}</p>
                <p><strong>Preference 4:</strong> {{ $student->profile->pref4 ?? 'No data available' }}</p>
                <p><strong>Preference 5:</strong> {{ $student->profile->pref5 ?? 'No data available' }}</p>
            @else
                <hr>
                <h3>Profile Details</h3>
                <p>No profile information available.</p>
            @endif
        </div>
    </div>
</div>
@endsection
