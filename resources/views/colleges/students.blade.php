@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Students Registered at {{ $college->collegename }}</h2>

    <!-- Search Form Card -->
    <div class="card border-0 shadow-sm rounded-4 mb-5">
        <div class="card-body p-4">
            <h4 class="fw-bold mb-4 text-center">Search Students</h4>
            <form method="GET" action="{{ route('colleges.students', ['college' => $college->id]) }}">
                <div class="row g-3">
                    <!-- Search by Name -->
                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control" placeholder="Search by Name" value="{{ request('name') }}">
                    </div>

                    <!-- Search by Email -->
                    <div class="col-md-6">
                        <input type="text" name="studentemail" class="form-control" placeholder="Search by Email" value="{{ request('studentemail') }}">
                    </div>

                    <!-- Search by Student ID -->
                    <div class="col-md-6">
                        <input type="text" name="studentid" class="form-control" placeholder="Search by Student ID" value="{{ request('studentid') }}">
                    </div>

                    <!-- Search by Age -->
                    <div class="col-md-6">
                        <input type="number" name="age" class="form-control" placeholder="Search by Age" value="{{ request('age') }}">
                    </div>

                    <!-- Search by State -->
                    <div class="col-md-6">
                        <select id="state" name="nationality" class="form-select">
                            <option value="">Select State</option>
                            @foreach ($states as $state)
                                <option value="{{ $state->name }}" {{ request('nationality') == $state->name ? 'selected' : '' }}>
                                    {{ $state->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Search by District -->
                    <div class="col-md-6">
                        <select id="district" name="home" class="form-select">
                            <option value="">Select District</option>
                            <!-- Districts will be dynamically loaded here -->
                        </select>
                    </div>

                    <!-- Search by Interests -->
                    <div class="col-md-6">
                        <select name="interest" class="form-select">
                            <option value="">Select Interest</option>
                            @foreach(['Sports', 'Music', 'Reading', 'Gaming', 'Traveling', 'Cooking', 'Art', 'Photography', 'Movies and Series', 'Fashion', 'DIY Projects', 'Writing', 'Technology & Gadgets', 'Meditation & Yoga', 'Gardening', 'Animals/Pets', 'Volunteering', 'Hiking', 'Collecting Memorabilia', 'Science & Astronomy', 'Fitness & Bodybuilding', 'Dance', 'Social Media', 'Entrepreneurship', 'Theater & Acting'] as $interest)
                                <option value="{{ $interest }}" {{ request('interest') == $interest ? 'selected' : '' }}>{{ $interest }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Search by Lifestyle -->
                    <div class="col-md-6">
                        <select name="lifestyle" class="form-select">
                            <option value="">Select Lifestyle</option>
                            @foreach(['Healthy', 'Fitness Enthusiast', 'Night Owl', 'Early Bird', 'Vegan', 'Minimalist', 'Adventurous', 'Eco-friendly/Sustainable Living', 'High Energy', 'Laid-back', 'Party Enthusiast', 'Study Focused', 'Organized & Tidy', 'Messy & Creative', 'Pet Lover', 'Quiet & Reserved', 'Fashion-Conscious', 'Extroverted', 'Introverted', 'Homebody', 'Spiritual', 'Tech-savvy', 'Social Butterfly', 'Artistic & Creative', 'Competitive'] as $lifestyle)
                                <option value="{{ $lifestyle }}" {{ request('lifestyle') == $lifestyle ? 'selected' : '' }}>{{ $lifestyle }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Search by Preferences -->
                    <div class="col-md-6">
                        <select name="preference" class="form-select">
                            <option value="">Select Preference</option>
                            @foreach(['Quiet Environment', 'Social Events', 'Outdoor Activities', 'Indoor Activities', 'Teamwork', 'Independent', 'Hands-on', 'Clean & Tidy Space', 'Shared Cooking', 'Structured Study Time', 'Spontaneous & Flexible', 'Music On Most of the Time', 'Prefer Silence/Quiet', 'Likes Hosting Guests', 'Prefers Minimal Guests', 'Regular Cleaning Schedule', 'Chill Weekend Activities', 'Enjoys Exploring the City', 'Loves Study Groups', 'Prefers Alone Time for Studying', 'Enjoys Decorating Shared Spaces', 'Low-Interaction Preference', 'High-Interaction Preference', 'Prefer Own Food Storage', 'Likes Shared Meals', 'Regular Gym Visits', 'Prefers Less Outdoor Activities', 'Smoking', 'Drinking', 'Non-Smoking', 'Non-Drinking', 'Comfortable with Pets'] as $preference)
                                <option value="{{ $preference }}" {{ request('preference') == $preference ? 'selected' : '' }}>{{ $preference }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Search Button -->
                    <div class="col-md-12 text-center mt-3">
                        <button type="submit" class="btn btn-primary btn-md px-5 py-2 shadow-sm">
                            <i class="bi bi-search me-2"></i>Search
                        </button>
                    </div>
                </div>
            </form>

    <!-- Recommended Roommates Button -->
    <div class="text-center mt-4">
        <a href="{{ route('recommend.roommates') }}" class="btn btn-success">Recommended Roommates</a>
    </div>
</div>
</div>

    @if($students->isEmpty())
        @if(request()->hasAny(['name', 'age', 'home', 'nationality', 'interest', 'lifestyle', 'preference']))
        <div class="alert alert-info text-center">
        <div class="mt-4 text-center">
            <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" class="img-fluid" style="max-width: 150px;">
        </div>
            <p class="text-center mt-4"><b>No students match your search criteria.</b></p>
        </div>
        @else
        <div class="alert alert-info text-center">
            <div class="mt-4 text-center">
                <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" class="img-fluid" style="max-width: 150px;">
            </div>
            <br>
            <p><b>No students have registered at this college yet.</b></p>
        </div>
        @endif
    @else
    <div class="row g-4">
        @foreach($students as $student)
            @if ($student->id != auth()->id())
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 rounded-4">
                        <div class="card-body text-center p-4">
                            <!-- Display Student Image -->
                            @if ($student->studentimage)
                                <div class="mb-4">
                                    <img src="{{ route('student.image', ['filename' => basename($student->studentimage)]) }}" alt="Student Image" class="img-thumbnail rounded-circle shadow-sm" width="100">
                                </div>
                            @else
                                <div class="mb-4">
                                    <i class="bi bi-person-circle fs-1 text-muted"></i>
                                </div>
                            @endif

                            <!-- Student Name with Link -->
                            <h5 class="card-title fw-bold">
                                <a href="{{ route('user.show', $student->id) }}" class="text-decoration-none text-dark">{{ $student->name }}</a>
                            </h5>

                            <!-- Student Information -->
                            <p class="card-text text-muted mb-2">
                                <i class="bi bi-person-badge me-1"></i> Student ID: {{ $student->studentid }}
                            </p>
                            <p class="card-text text-muted">
                                <i class="bi bi-envelope-fill me-1"></i> <a href="mailto:{{ $student->studentemail }}" class="text-decoration-none text-muted">{{ $student->studentemail }}</a>
                            </p>
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
