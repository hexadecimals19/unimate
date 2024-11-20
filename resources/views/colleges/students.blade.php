@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Students Registered at {{ $college->collegename }}</h2>

<!-- Search Form -->
<form method="GET" action="{{ route('colleges.students', ['college' => $college->id]) }}" class="mb-4">
    <div class="row">
        <!-- Search by Name -->
        <div class="col-md-6 mb-2">
            <input type="text" name="name" class="form-control" placeholder="Search by Name" value="{{ request('name') }}">
        </div>

        <!-- Search by Email -->
        <div class="col-md-6 mb-2">
            <input type="text" name="studentemail" class="form-control" placeholder="Search by Email" value="{{ request('studentemail') }}">
        </div>

        <!-- Search by Student ID -->
        <div class="col-md-6 mb-2">
            <input type="text" name="studentid" class="form-control" placeholder="Search by Student ID" value="{{ request('studentid') }}">
        </div>


        <!-- Search by Age -->
        <div class="col-md-6 mb-2">
            <input type="number" name="age" class="form-control" placeholder="Search by Age" value="{{ request('age') }}">
        </div>

<!-- Search by State -->
<div class="col-md-6 mb-2">
    <select id="state" name="nationality" class="form-control">
        <option value="">Select State</option>
        @foreach ($states as $state)
            <option value="{{ $state->name }}" {{ request('nationality') == $state->name ? 'selected' : '' }}>
                {{ $state->name }}
            </option>
        @endforeach
    </select>
</div>

<!-- Search by District -->
<div class="col-md-6 mb-2">
    <select id="district" name="home" class="form-control">
        <option value="">Select District</option>
        <!-- Districts will be dynamically loaded here -->
    </select>
</div>

        <!-- Search by Interests -->
        <div class="col-md-6 mb-2">
            <select name="interest" class="form-control">
                <option value="">Select Interest</option>
                @foreach(['Sports', 'Music', 'Reading', 'Gaming', 'Traveling', 'Cooking', 'Art', 'Photography', 'Movies and Series', 'Fashion', 'DIY Projects', 'Writing', 'Technology & Gadgets', 'Meditation & Yoga', 'Gardening', 'Animals/Pets', 'Volunteering', 'Hiking', 'Collecting Memorabilia', 'Science & Astronomy', 'Fitness & Bodybuilding', 'Dance', 'Social Media', 'Entrepreneurship', 'Theater & Acting'] as $interest)
                    <option value="{{ $interest }}" {{ request('interest') == $interest ? 'selected' : '' }}>{{ $interest }}</option>
                @endforeach
            </select>
        </div>

        <!-- Search by Lifestyle -->
        <div class="col-md-6 mb-2">
            <select name="lifestyle" class="form-control">
                <option value="">Select Lifestyle</option>
                @foreach(['Healthy', 'Fitness Enthusiast', 'Night Owl', 'Early Bird', 'Vegan', 'Minimalist', 'Adventurous', 'Eco-friendly/Sustainable Living', 'High Energy', 'Laid-back', 'Party Enthusiast', 'Study Focused', 'Organized & Tidy', 'Messy & Creative', 'Pet Lover', 'Quiet & Reserved', 'Fashion-Conscious', 'Extroverted', 'Introverted', 'Homebody', 'Spiritual', 'Tech-savvy', 'Social Butterfly', 'Artistic & Creative', 'Competitive'] as $lifestyle)
                    <option value="{{ $lifestyle }}" {{ request('lifestyle') == $lifestyle ? 'selected' : '' }}>{{ $lifestyle }}</option>
                @endforeach
            </select>
        </div>

        <!-- Search by Preferences -->
        <div class="col-md-6 mb-2">
            <select name="preference" class="form-control">
                <option value="">Select Preference</option>
                @foreach(['Quiet Environment', 'Social Events', 'Outdoor Activities', 'Indoor Activities', 'Teamwork', 'Independent', 'Hands-on', 'Clean & Tidy Space', 'Shared Cooking', 'Structured Study Time', 'Spontaneous & Flexible', 'Music On Most of the Time', 'Prefer Silence/Quiet', 'Likes Hosting Guests', 'Prefers Minimal Guests', 'Regular Cleaning Schedule', 'Chill Weekend Activities', 'Enjoys Exploring the City', 'Loves Study Groups', 'Prefers Alone Time for Studying', 'Enjoys Decorating Shared Spaces', 'Low-Interaction Preference', 'High-Interaction Preference', 'Prefer Own Food Storage', 'Likes Shared Meals', 'Regular Gym Visits', 'Prefers Less Outdoor Activities', 'Smoking', 'Drinking', 'Non-Smoking', 'Non-Drinking', 'Comfortable with Pets'] as $preference)
                    <option value="{{ $preference }}" {{ request('preference') == $preference ? 'selected' : '' }}>{{ $preference }}</option>
                @endforeach
            </select>
        </div>

        <!-- Search Button -->
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#state').on('change', function () {
            let stateName = $(this).val();
            if (stateName) {
                $.ajax({
                    url: '/districts-by-state/' + stateName,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#district').empty();
                        $('#district').append('<option value="">Select District</option>');
                        $.each(data, function (key, value) {
                            $('#district').append('<option value="' + value.name + '">' + value.name + '</option>');
                        });
                    },
                    error: function () {
                        console.error('Error fetching districts');
                    }
                });
            } else {
                $('#district').empty();
                $('#district').append('<option value="">Select District</option>');
            }
        });
    });
</script>

@endsection
