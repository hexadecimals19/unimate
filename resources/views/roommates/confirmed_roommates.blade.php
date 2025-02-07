@extends('layouts.app')

@section('content')
    <div class="container mt-5 text-center">
        <h1 class="mb-4">Your Confirmed Roommates</h1>

        @if($confirmedRoommates->isEmpty())
            <div class="alert alert-info text-center">
                <div class="mt-4 text-center">
                    <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" class="img-fluid" style="max-width: 150px;">
                </div>
                <p>You do not have any confirmed roommates yet.</p>
            </div>
        @else
            <div class="row g-4">
                @foreach($confirmedRoommates as $roommateApplication)
                    @php
                        $roommate = $roommateApplication->applicant_id == Auth::id()
                                    ? $roommateApplication->roommate
                                    : $roommateApplication->applicant;

                        // Make sure $roommate is not null before accessing its properties
                        if ($roommate) {
                            $existingReview = \App\Models\Review::where('user_id', Auth::id())
                                                                ->where('roommate_id', $roommate->id)
                                                                ->first();
                        }
                    @endphp

                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $roommate->name ?? 'Deleted User' }}</h5>

                                <!-- Display Student Image -->
                                @if ($roommate && $roommate->studentimage)
                                    <div class="mb-3">
                                        <img src="{{ route('student.image', ['filename' => basename($roommate->studentimage)]) }}" alt="Student Image" class="img-thumbnail rounded-circle shadow-sm" width="100" height="100">
                                    </div>
                                @else
                                    <div class="mb-3">
                                        <p>No student image available.</p>
                                    </div>
                                @endif

                                <ul class="list-unstyled mt-3">
                                    <li><strong>Age:</strong> {{ $roommate->profile->age ?? 'N/A' }}</li>
                                    <li><strong>State:</strong> {{ $roommate->profile->nationality ?? 'N/A' }}</li>
                                    <li><strong>District:</strong> {{ $roommate->profile->home ?? 'N/A' }}</li>
                                    <li><strong>Bio:</strong> {{ $roommate->profile->bio ?? 'N/A' }}</li>
                                </ul>

                                @if ($roommate && $roommate->contact)
                                    <hr>
                                    <h6>Contact Information</h6>
                                    <ul class="list-unstyled">
                                        <li><strong>Phone Number:</strong> {{ $roommate->contact->show_phone_number ? ($roommate->contact->phone_number ?? 'N/A') : 'Hidden by user' }}</li>

                                        <li><strong>WhatsApp:</strong> {{ $roommate->contact->show_whatsapp ? ($roommate->contact->whatsapp ?? 'N/A') : 'Hidden by user' }}</li>

                                        <li><strong>Telegram:</strong> {{ $roommate->contact->show_telegram ? ($roommate->contact->telegram ?? 'N/A') : 'Hidden by user' }}</li>

                                        <li><strong>Facebook Profile:</strong> {{ $roommate->contact->show_facebook_profile ?($roommate->contact->facebook_profile ?? 'N/A') : 'Hidden by user' }}</li>

                                        <li><strong>Twitter Profile:</strong>  {{ $roommate->contact->show_twitter_profile ?
                                        ($roommate->contact->twitter_profile ?? 'N/A') : 'Hidden by user' }}</li>

                                        <li><strong>Instagram Profile:</strong> {{ $roommate->contact->show_instagram_profile ?($roommate->contact->instagram_profile ?? 'N/A') : 'Hidden by user' }}</li>
                                    </ul>
                                @endif
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <span class="text-muted">Confirmed Roommate</span>
                                <div class="d-flex">
                                    <form action="{{ route('roommate.remove', $roommateApplication->id) }}" method="POST" class="me-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                    </form>
                                    @if($roommate && !$existingReview)
                                        <a href="{{ route('reviews.create', $roommate->id) }}" class="btn btn-primary btn-sm">Write Review</a>
                                    @elseif($roommate && $existingReview)
                                        <span class="text-success">Review Submitted</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
