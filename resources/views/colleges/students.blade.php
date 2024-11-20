@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Students Registered at {{ $college->collegename }}</h2>

    <!-- Search Form -->
    <form method="GET" action="{{ route('colleges.students', ['college' => $college->id]) }}" class="mb-4">
        <div class="row">
            <div class="col-md-6 mb-2">
                <input type="text" name="name" class="form-control" placeholder="Search by Name" value="{{ request('name') }}">
            </div>
            <div class="col-md-6 mb-2">
                <input type="number" name="age" class="form-control" placeholder="Search by Age" value="{{ request('age') }}">
            </div>
            <div class="col-md-6 mb-2">
                <input type="text" name="home" class="form-control" placeholder="Search by Home" value="{{ request('home') }}">
            </div>
            <div class="col-md-6 mb-2">
                <input type="text" name="nationality" class="form-control" placeholder="Search by States" value="{{ request('nationality') }}">
            </div>
            <div class="col-md-6 mb-2">
                <select name="interest" id="interest" class="form-control">
                    <option value="">Select Interest</option>
                    @foreach(['Sports', 'Music', 'Reading', 'Gaming', 'Traveling', 'Cooking', 'Art'] as $interest)
                        <option value="{{ $interest }}" {{ request('interest') == $interest ? 'selected' : '' }}>{{ $interest }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-2">
                <select name="lifestyle" id="lifestyle" class="form-control">
                    <option value="">Select Lifestyle</option>
                    @foreach(['Healthy', 'Fitness Enthusiast', 'Night Owl', 'Early Bird', 'Vegan', 'Minimalist', 'Adventurous'] as $lifestyle)
                        <option value="{{ $lifestyle }}" {{ request('lifestyle') == $lifestyle ? 'selected' : '' }}>{{ $lifestyle }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 mb-2">
                <select name="preference" id="preference" class="form-control">
                    <option value="">Select Preference</option>
                    @foreach(['Quiet Environment', 'Social Events', 'Outdoor Activities', 'Indoor Activities', 'Teamwork', 'Independent', 'Hands-on'] as $preference)
                        <option value="{{ $preference }}" {{ request('preference') == $preference ? 'selected' : '' }}>{{ $preference }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <!-- Recommended Roommates Button -->
    <div class="text-center mt-4">
        <a href="{{ route('recommend.roommates') }}" class="btn btn-success">Recommended Roommates</a>
    </div>

    <br>
    <br>

    @if($students->isEmpty())
        @if(request()->hasAny(['name', 'age', 'home', 'nationality', 'interest', 'lifestyle', 'preference']))
            <p class="text-center mt-4">No students match your search criteria.</p>
        @else
            <p class="text-center mt-4">No students have registered at this college yet.</p>
        @endif
    @else
        <div class="row">
            @foreach($students as $student)
                @if ($student->id != auth()->id())
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body text-center">
                                @if ($student->studentimage)
                                    <div class="mb-4">
                                        <img src="{{ route('student.image', ['filename' => basename($student->studentimage)]) }}" alt="Student Image" class="img-thumbnail rounded-circle" width="100">
                                    </div>
                                @endif
                                <h5 class="card-title">
                                    <a href="{{ route('user.show', $student->id) }}">{{ $student->name }}</a>
                                </h5>
                                <p class="card-text">Student ID: {{ $student->studentid }}</p>
                                <p class="card-text">Email: {{ $student->studentemail }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif
</div>
@endsection
