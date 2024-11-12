@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Your Roommate Applications</h2>

    @if ($applications->isEmpty())
        <p class="text-center mt-4">You have no roommate applications at this time.</p>
    @else
        <div class="row">
            @foreach ($applications as $application)
                <div class="col-md-4 mb-4">
                    <div class="card {{ strtolower($application->status) == 'accepted' ? 'bg-success text-white' : (strtolower($application->status) == 'reject' || strtolower($application->status) == 'rejected' ? 'bg-danger text-white' : '') }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $application->roommate->name }}</h5>
                            <p><strong>Student ID:</strong> {{ $application->roommate->studentid }}</p>
                            <p><strong>Email:</strong> {{ $application->roommate->studentemail }}</p>
                            <p><strong>College:</strong> {{ $application->roommate->studentcollege }}</p>
                            <p><strong>Gender:</strong> {{ $application->roommate->studentgender }}</p>
                            <p><strong>Status:</strong>
                                <span>{{ ucfirst($application->status) }}</span>
                            </p>

                            @if (strtolower($application->status) == 'reject' || strtolower($application->status) == 'rejected')
                                <!-- Remove Button for Rejected Applications -->
                                <form action="{{ route('applications.destroy', $application->id) }}" method="POST" class="mt-3">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Remove</button>
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
