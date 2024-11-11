@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Your Confirmed Roommates</h1>

        @if($confirmedRoommates->isEmpty())
            <p>You do not have any confirmed roommates yet.</p>
        @else
            <div class="row">
                @foreach($confirmedRoommates as $roommateApplication)
                    @php
                        $roommate = $roommateApplication->applicant_id == Auth::id()
                                    ? $roommateApplication->roommate
                                    : $roommateApplication->applicant;
                    @endphp
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $roommate->name }}</h5>
                                <p class="card-text">
                                    <strong>Age:</strong> {{ $roommate->profile->age ?? 'N/A' }}<br>
                                    <strong>Nationality:</strong> {{ $roommate->profile->nationality ?? 'N/A' }}<br>
                                    <strong>Home:</strong> {{ $roommate->profile->home ?? 'N/A' }}<br>
                                    <strong>Bio:</strong> {{ $roommate->profile->bio ?? 'N/A' }}
                                </p>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <span class="text-muted">Confirmed Roommate</span>
                                <form action="{{ route('roommate.remove', $roommateApplication->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
