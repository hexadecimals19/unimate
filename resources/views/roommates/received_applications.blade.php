@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Roommate Applications You Have Received</h1>

        <!-- Display success messages -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($applications->isEmpty())
            <p>No one has applied to be your roommate yet.</p>
        @else
            <div class="row">
                @foreach($applications as $application)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <!-- Applicant Details -->
                                <h5 class="card-title">{{ $application->applicant->name }}</h5>
                                <p class="card-text"><strong>Student ID:</strong> {{ $application->applicant->studentid }}</p>
                                <p class="card-text"><strong>Email:</strong> {{ $application->applicant->studentemail }}</p>
                                <p class="card-text"><strong>College:</strong> {{ $application->applicant->studentcollege }}</p>
                                <p class="card-text"><strong>Gender:</strong> {{ $application->applicant->studentgender }}</p>

                                <!-- Action Buttons -->
                                <div class="d-flex justify-content-between mt-3">
                                    <form action="{{ route('roommate.accept', $application->id) }}" method="POST" class="me-2">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Accept</button>
                                    </form>

                                    <form action="{{ route('roommate.reject', $application->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Reject</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
