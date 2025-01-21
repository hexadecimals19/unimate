@extends('layouts.app')

@section('content')
<div class="container mt-5 text-center">
    <h1 class="mb-4">Your Roommate Applications</h1>

    @if ($applications->isEmpty())
        <div class="alert alert-info text-center">
            <div class="mt-4 text-center">
                <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" class="img-fluid" style="max-width: 150px;">
            </div>
            <p>You have no roommate applications at this time.</p>
        </div>
    @else
        <div class="row g-4">
            @foreach ($applications as $application)
                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-sm border-0
                        {{ strtolower($application->status) == 'accepted' ? 'bg-success text-white' :
                        (strtolower($application->status) == 'reject' || strtolower($application->status) == 'rejected' ? 'bg-danger text-white' : '') }}">
                        <div class="card-body">
                            @if ($application->roommate)
                                <h5 class="card-title fw-bold">{{ $application->roommate->name }}</h5>
                                <ul class="list-unstyled mt-3">
                                    <li><strong>Student ID:</strong> {{ $application->roommate->studentid }}</li>
                                    <li><strong>Email:</strong> {{ $application->roommate->studentemail }}</li>
                                    <li><strong>College:</strong> {{ $application->roommate->studentcollege }}</li>
                                    <li><strong>Gender:</strong> {{ $application->roommate->studentgender }}</li>
                                    <li><strong>Status:</strong> <span>{{ ucfirst($application->status) }}</span></li>
                                </ul>
                            @else
                                <h5 class="card-title fw-bold text-danger">Roommate Not Found</h5>
                                <p class="mt-3">This application is missing roommate information.</p>
                            @endif

                            @if (!$application->roommate || strtolower($application->status) == 'reject' || strtolower($application->status) == 'rejected')
                                <form action="{{ route('applications.destroy', $application->id) }}" method="POST" class="mt-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-light w-100">
                                        Remove {{ !$application->roommate ? 'Application' : '' }}
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
