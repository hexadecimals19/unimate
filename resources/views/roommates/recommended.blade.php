@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Recommended Roommates</h2>

    @if(empty($recommendedRoommates))
        <p class="text-center mt-4">No recommended roommates found based on your profile.</p>
    @else
        <div class="row">
            @foreach($recommendedRoommates as $roommate)
                @if ($roommate['user']->studentgender == auth()->user()->studentgender && $roommate['score'] > 0)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body text-center">
                                @if ($roommate['user']->studentimage)
                                    <div class="mb-4">
                                        <img src="{{ route('student.image', ['filename' => basename($roommate['user']->studentimage)]) }}" alt="Student Image" class="img-thumbnail rounded-circle" width="100">
                                    </div>
                                @endif
                                <h5 class="card-title">
                                    <a href="{{ route('user.show', $roommate['user']->id) }}">{{ $roommate['user']->name }}</a>
                                </h5>
                                <p class="card-text">Score: {{ $roommate['score'] }}</p>
                                <p class="card-text">Matching Details:</p>
                                <ul class="list-unstyled">
                                    @if ($roommate['details']['age'])
                                        <li>Age: Similar ({{ $roommate['details']['age_points'] }} points)</li>
                                    @endif
                                    @if ($roommate['details']['nationality'])
                                        <li>Nationality: Match ({{ $roommate['details']['nationality_points'] }} points)</li>
                                    @endif
                                    @if ($roommate['details']['interests'])
                                        <li>Interests: {{ $roommate['details']['common_interests'] }} common interests ({{ $roommate['details']['interests_points'] }} points)</li>
                                    @endif
                                    @if ($roommate['details']['lifestyles'])
                                        <li>Lifestyles: {{ $roommate['details']['common_lifestyles'] }} common lifestyles ({{ $roommate['details']['lifestyles_points'] }} points)</li>
                                    @endif
                                    @if ($roommate['details']['preferences'])
                                        <li>Preferences: {{ $roommate['details']['common_preferences'] }} common preferences ({{ $roommate['details']['preferences_points'] }} points)</li>
                                    @endif
                                </ul>
                                <p class="card-text">Student ID: {{ $roommate['user']->studentid }}</p>
                                <p class="card-text">Email: {{ $roommate['user']->studentemail }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif
</div>
@endsection
