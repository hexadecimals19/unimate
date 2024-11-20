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
                        // Check if a review already exists for this roommate
                        $existingReview = \App\Models\Review::where('user_id', Auth::id())
                                                            ->where('roommate_id', $roommate->id)
                                                            ->first();
                    @endphp
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $roommate->name }}</h5>
                                <p class="card-text">
                                    <strong>Age:</strong> {{ $roommate->profile->age ?? 'N/A' }}<br>
                                    <strong>State:</strong> {{ $roommate->profile->nationality ?? 'N/A' }}<br>
                                    <strong>District:</strong> {{ $roommate->profile->home ?? 'N/A' }}<br>
                                    <strong>Bio:</strong> {{ $roommate->profile->bio ?? 'N/A' }}
                                </p>
                                @if ($roommate->contact)
                                    <hr>
                                    <h6>Contact Information</h6>
                                    <p class="card-text">
                                        <strong>Phone Number:</strong>
                                        @if ($roommate->contact->show_phone_number)
                                            {{ $roommate->contact->phone_number ?? 'N/A' }}
                                        @else
                                            Hidden by user
                                        @endif
                                        <br>

                                        <strong>WhatsApp:</strong>
                                        @if ($roommate->contact->show_whatsapp)
                                            {{ $roommate->contact->whatsapp ?? 'N/A' }}
                                        @else
                                            Hidden by user
                                        @endif
                                        <br>

                                        <strong>Telegram:</strong>
                                        @if ($roommate->contact->show_telegram)
                                            {{ $roommate->contact->telegram ?? 'N/A' }}
                                        @else
                                            Hidden by user
                                        @endif
                                        <br>

                                        <strong>Facebook Profile:</strong>
                                        @if ($roommate->contact->show_facebook_profile)
                                            @if ($roommate->contact->facebook_profile)
                                                <a href="{{ $roommate->contact->facebook_profile }}" target="_blank">{{ $roommate->contact->facebook_profile }}</a>
                                            @else
                                                N/A
                                            @endif
                                        @else
                                            Hidden by user
                                        @endif
                                        <br>

                                        <strong>Twitter Profile:</strong>
                                        @if ($roommate->contact->show_twitter_profile)
                                            @if ($roommate->contact->twitter_profile)
                                                <a href="{{ $roommate->contact->twitter_profile }}" target="_blank">{{ $roommate->contact->twitter_profile }}</a>
                                            @else
                                                N/A
                                            @endif
                                        @else
                                            Hidden by user
                                        @endif
                                        <br>

                                        <strong>Instagram Profile:</strong>
                                        @if ($roommate->contact->show_instagram_profile)
                                            @if ($roommate->contact->instagram_profile)
                                                <a href="{{ $roommate->contact->instagram_profile }}" target="_blank">{{ $roommate->contact->instagram_profile }}</a>
                                            @else
                                                N/A
                                            @endif
                                        @else
                                            Hidden by user
                                        @endif
                                    </p>
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
                                    @if(!$existingReview)
                                        <a href="{{ route('reviews.create', $roommate->id) }}" class="btn btn-primary btn-sm">Write Review</a>
                                    @else
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
