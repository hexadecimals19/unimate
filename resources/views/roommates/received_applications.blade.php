@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Roommate Applications You Have Received</h1>

        <!-- Display success messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($applications->isEmpty())
            <div class="text-center">
                <div class="mt-4 text-center">
                    <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" class="img-fluid" style="max-width: 150px;">
                </div>
                <p class="alert alert-info text-center">No one has applied to be your roommate yet.</p>
            </div>
        @else
            <div class="row">
                @foreach($applications as $application)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow-sm border-0 rounded-3">
                            <div class="card-body p-4">
                                <!-- Applicant Details -->
                                <h5 class="card-title fw-bold">{{ $application->applicant->name }}</h5>
                                <p class="card-text mb-1"><strong>Student ID:</strong> {{ $application->applicant->studentid }}</p>
                                <p class="card-text mb-1"><strong>Email:</strong> <a href="mailto:{{ $application->applicant->studentemail }}" class="text-decoration-none">{{ $application->applicant->studentemail }}</a></p>
                                <p class="card-text mb-1"><strong>College:</strong> {{ $application->applicant->studentcollege }}</p>
                                <p class="card-text"><strong>Gender:</strong> {{ $application->applicant->studentgender }}</p>

                                <!-- Action Buttons -->
                                <div class="d-flex justify-content-between align-items-center mt-4">
                                    <form action="{{ route('roommate.accept', $application->id) }}" method="POST" class="me-2">
                                        @csrf
                                        <button type="submit" class="btn btn-success w-100">Accept</button>
                                    </form>

                                    <form action="{{ route('roommate.reject', $application->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger w-100">Reject</button>
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
