@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Roommate Applications You Have Received</h1>

        <!-- Display success messages -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($applications->isEmpty())
            <p>No one has applied to be your roommate yet.</p>
        @else
            <ul>
                @foreach($applications as $application)
                    <li>
                        <strong>{{ $application->applicant->name }}</strong> has applied to be your roommate.
                        <form action="{{ route('roommate.accept', $application->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success">Accept</button>
                        </form>
                        <form action="{{ route('roommate.reject', $application->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Reject</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
