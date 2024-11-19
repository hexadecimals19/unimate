@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header">
            <h1 class="mb-0">Edit Profile</h1>
        </div>
        <div class="card-body">

            <!-- Display validation errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Edit profile form -->
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- User Information -->
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="studentemail">Student Email:</label>
                    <input type="text" name="studentemail" id="studentemail" class="form-control" value="{{ $user->studentemail }}" readonly>
                </div>

                <div class="form-group">
                    <label for="studentid">Student ID:</label>
                    <input type="text" name="studentid" id="studentid" class="form-control" value="{{ old('studentid', $user->studentid) }}" required>
                </div>

                <div class="form-group">
                    <label for="studentgender">Student Gender:</label>
                    <select name="studentgender" id="studentgender" class="form-control" disabled>
                        <option value="male" {{ $user->studentgender == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $user->studentgender == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ $user->studentgender == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                    <input type="hidden" name="studentgender" value="{{ $user->studentgender }}">
                </div>

                <div class="form-group">
                    <label for="studentcollege">Student College:</label>
                    <select name="studentcollege" id="studentcollege" class="form-control" required>
                        @foreach($colleges as $college)
                            <option value="{{ $college->collegename }}" {{ old('studentcollege', $user->studentcollege) == $college->collegename ? 'selected' : '' }}>
                                {{ $college->collegename }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="studentimage">Upload Student Image:</label>
                    <input type="file" name="studentimage" id="studentimage" class="form-control-file">
                    @if ($user->studentimage)
                        <div class="mt-3">
                            <label>Current Student Image:</label><br>
                            <img src="{{ route('student.image', ['filename' => basename($user->studentimage)]) }}" alt="Student Image" class="img-thumbnail" width="150">
                        </div>
                    @else
                        <div class="mt-3">
                            <p>No student image available.</p>
                        </div>
                    @endif
                </div>

                <!-- Profile Information -->
                <div class="form-group">
                    <label for="bio">Bio:</label>
                    <textarea name="bio" id="bio" class="form-control">{{ old('bio', $user->profile->bio ?? '') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="date_of_birth">Date of Birth:</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('date_of_birth', $user->profile->date_of_birth ?? '') }}">
                </div>

                <!-- State Dropdown -->
                <div class="form-group">
                    <label for="nationality">State:</label>
                    <select name="nationality" id="state" class="form-control" required>
                        <option value="">Select State</option>
                        @foreach ($states as $state)
                            <option value="{{ $state->name }}" {{ old('nationality', $user->profile->nationality ?? '') == $state->name ? 'selected' : '' }}>
                                {{ $state->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- District Dropdown -->
                <div class="form-group">
                    <label for="home">District:</label>
                    <select name="home" id="district" class="form-control" required>
                        <option value="">Select District</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="number" name="age" id="age" class="form-control" value="{{ old('age', $user->profile->age ?? '') }}">
                </div>

<!-- Interests Dropdown -->
<div class="form-group">
    <label for="interest1">Interest 1:</label>
    <select name="interest1" id="interest1" class="form-control">
        <option value="">Select Interest 1</option>
        @foreach(['Sports', 'Music', 'Reading', 'Gaming', 'Traveling', 'Cooking', 'Art', 'Photography', 'Movies and Series', 'Fashion', 'DIY Projects', 'Writing', 'Technology & Gadgets', 'Meditation & Yoga', 'Gardening', 'Animals/Pets', 'Volunteering', 'Hiking', 'Collecting Memorabilia', 'Science & Astronomy', 'Fitness & Bodybuilding', 'Dance', 'Social Media', 'Entrepreneurship', 'Theater & Acting'] as $interest)
            <option value="{{ $interest }}" {{ old('interest1', $user->profile->interest1 ?? '') == $interest ? 'selected' : '' }}>
                {{ $interest }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="interest2">Interest 2:</label>
    <select name="interest2" id="interest2" class="form-control">
        <option value="">Select Interest 2</option>
        @foreach(['Sports', 'Music', 'Reading', 'Gaming', 'Traveling', 'Cooking', 'Art', 'Photography', 'Movies and Series', 'Fashion', 'DIY Projects', 'Writing', 'Technology & Gadgets', 'Meditation & Yoga', 'Gardening', 'Animals/Pets', 'Volunteering', 'Hiking', 'Collecting Memorabilia', 'Science & Astronomy', 'Fitness & Bodybuilding', 'Dance', 'Social Media', 'Entrepreneurship', 'Theater & Acting'] as $interest)
            <option value="{{ $interest }}" {{ old('interest2', $user->profile->interest2 ?? '') == $interest ? 'selected' : '' }}>
                {{ $interest }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="interest3">Interest 3:</label>
    <select name="interest3" id="interest3" class="form-control">
        <option value="">Select Interest 3</option>
        @foreach(['Sports', 'Music', 'Reading', 'Gaming', 'Traveling', 'Cooking', 'Art', 'Photography', 'Movies and Series', 'Fashion', 'DIY Projects', 'Writing', 'Technology & Gadgets', 'Meditation & Yoga', 'Gardening', 'Animals/Pets', 'Volunteering', 'Hiking', 'Collecting Memorabilia', 'Science & Astronomy', 'Fitness & Bodybuilding', 'Dance', 'Social Media', 'Entrepreneurship', 'Theater & Acting'] as $interest)
            <option value="{{ $interest }}" {{ old('interest3', $user->profile->interest3 ?? '') == $interest ? 'selected' : '' }}>
                {{ $interest }}
            </option>
        @endforeach
    </select>
</div>

<!-- Lifestyle Dropdown -->
<div class="form-group">
    <label for="lifestyle1">Lifestyle 1:</label>
    <select name="lifestyle1" id="lifestyle1" class="form-control">
        <option value="">Select Lifestyle 1</option>
        @foreach(['Healthy', 'Fitness Enthusiast', 'Night Owl', 'Early Bird', 'Vegan', 'Minimalist', 'Adventurous', 'Eco-friendly/Sustainable Living', 'High Energy', 'Laid-back', 'Party Enthusiast', 'Study Focused', 'Organized & Tidy', 'Messy & Creative', 'Pet Lover', 'Quiet & Reserved', 'Fashion-Conscious', 'Extroverted', 'Introverted', 'Homebody', 'Spiritual', 'Tech-savvy', 'Social Butterfly', 'Artistic & Creative', 'Competitive'] as $lifestyle)
            <option value="{{ $lifestyle }}" {{ old('lifestyle1', $user->profile->lifestyle1 ?? '') == $lifestyle ? 'selected' : '' }}>
                {{ $lifestyle }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="lifestyle2">Lifestyle 2:</label>
    <select name="lifestyle2" id="lifestyle2" class="form-control">
        <option value="">Select Lifestyle 2</option>
        @foreach(['Healthy', 'Fitness Enthusiast', 'Night Owl', 'Early Bird', 'Vegan', 'Minimalist', 'Adventurous', 'Eco-friendly/Sustainable Living', 'High Energy', 'Laid-back', 'Party Enthusiast', 'Study Focused', 'Organized & Tidy', 'Messy & Creative', 'Pet Lover', 'Quiet & Reserved', 'Fashion-Conscious', 'Extroverted', 'Introverted', 'Homebody', 'Spiritual', 'Tech-savvy', 'Social Butterfly', 'Artistic & Creative', 'Competitive'] as $lifestyle)
            <option value="{{ $lifestyle }}" {{ old('lifestyle2', $user->profile->lifestyle2 ?? '') == $lifestyle ? 'selected' : '' }}>
                {{ $lifestyle }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="lifestyle3">Lifestyle 3:</label>
    <select name="lifestyle3" id="lifestyle3" class="form-control">
        <option value="">Select Lifestyle 3</option>
        @foreach(['Healthy', 'Fitness Enthusiast', 'Night Owl', 'Early Bird', 'Vegan', 'Minimalist', 'Adventurous', 'Eco-friendly/Sustainable Living', 'High Energy', 'Laid-back', 'Party Enthusiast', 'Study Focused', 'Organized & Tidy', 'Messy & Creative', 'Pet Lover', 'Quiet & Reserved', 'Fashion-Conscious', 'Extroverted', 'Introverted', 'Homebody', 'Spiritual', 'Tech-savvy', 'Social Butterfly', 'Artistic & Creative', 'Competitive'] as $lifestyle)
            <option value="{{ $lifestyle }}" {{ old('lifestyle3', $user->profile->lifestyle3 ?? '') == $lifestyle ? 'selected' : '' }}>
                {{ $lifestyle }}
            </option>
        @endforeach
    </select>
</div>

<!-- Preferences Dropdown -->
<div class="form-group">
    <label for="pref1">Preference 1:</label>
    <select name="pref1" id="pref1" class="form-control">
        <option value="">Select Preference 1</option>
        @foreach(['Quiet Environment', 'Social Events', 'Outdoor Activities', 'Indoor Activities', 'Teamwork', 'Independent', 'Hands-on', 'Clean & Tidy Space', 'Shared Cooking', 'Structured Study Time', 'Spontaneous & Flexible', 'Music On Most of the Time', 'Prefer Silence/Quiet', 'Likes Hosting Guests', 'Prefers Minimal Guests', 'Regular Cleaning Schedule', 'Chill Weekend Activities', 'Enjoys Exploring the City', 'Loves Study Groups', 'Prefers Alone Time for Studying', 'Enjoys Decorating Shared Spaces', 'Low-Interaction Preference', 'High-Interaction Preference', 'Prefer Own Food Storage', 'Likes Shared Meals', 'Regular Gym Visits', 'Prefers Less Outdoor Activities', 'Smoking', 'Drinking', 'Non-Smoking', 'Non-Drinking', 'Comfortable with Pets'] as $preference)
            <option value="{{ $preference }}" {{ old('pref1', $user->profile->pref1 ?? '') == $preference ? 'selected' : '' }}>
                {{ $preference }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="pref2">Preference 2:</label>
    <select name="pref2" id="pref2" class="form-control">
        <option value="">Select Preference 2</option>
        @foreach(['Quiet Environment', 'Social Events', 'Outdoor Activities', 'Indoor Activities', 'Teamwork', 'Independent', 'Hands-on', 'Clean & Tidy Space', 'Shared Cooking', 'Structured Study Time', 'Spontaneous & Flexible', 'Music On Most of the Time', 'Prefer Silence/Quiet', 'Likes Hosting Guests', 'Prefers Minimal Guests', 'Regular Cleaning Schedule', 'Chill Weekend Activities', 'Enjoys Exploring the City', 'Loves Study Groups', 'Prefers Alone Time for Studying', 'Enjoys Decorating Shared Spaces', 'Low-Interaction Preference', 'High-Interaction Preference', 'Prefer Own Food Storage', 'Likes Shared Meals', 'Regular Gym Visits', 'Prefers Less Outdoor Activities', 'Smoking', 'Drinking', 'Non-Smoking', 'Non-Drinking', 'Comfortable with Pets'] as $preference)
            <option value="{{ $preference }}" {{ old('pref2', $user->profile->pref2 ?? '') == $preference ? 'selected' : '' }}>
                {{ $preference }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="pref3">Preference 3:</label>
    <select name="pref3" id="pref3" class="form-control">
        <option value="">Select Preference 3</option>
        @foreach(['Quiet Environment', 'Social Events', 'Outdoor Activities', 'Indoor Activities', 'Teamwork', 'Independent', 'Hands-on', 'Clean & Tidy Space', 'Shared Cooking', 'Structured Study Time', 'Spontaneous & Flexible', 'Music On Most of the Time', 'Prefer Silence/Quiet', 'Likes Hosting Guests', 'Prefers Minimal Guests', 'Regular Cleaning Schedule', 'Chill Weekend Activities', 'Enjoys Exploring the City', 'Loves Study Groups', 'Prefers Alone Time for Studying', 'Enjoys Decorating Shared Spaces', 'Low-Interaction Preference', 'High-Interaction Preference', 'Prefer Own Food Storage', 'Likes Shared Meals', 'Regular Gym Visits', 'Prefers Less Outdoor Activities', 'Smoking', 'Drinking', 'Non-Smoking', 'Non-Drinking', 'Comfortable with Pets'] as $preference)
            <option value="{{ $preference }}" {{ old('pref3', $user->profile->pref3 ?? '') == $preference ? 'selected' : '' }}>
                {{ $preference }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="pref4">Preference 4:</label>
    <select name="pref4" id="pref4" class="form-control">
        <option value="">Select Preference 4</option>
        @foreach(['Quiet Environment', 'Social Events', 'Outdoor Activities', 'Indoor Activities', 'Teamwork', 'Independent', 'Hands-on', 'Clean & Tidy Space', 'Shared Cooking', 'Structured Study Time', 'Spontaneous & Flexible', 'Music On Most of the Time', 'Prefer Silence/Quiet', 'Likes Hosting Guests', 'Prefers Minimal Guests', 'Regular Cleaning Schedule', 'Chill Weekend Activities', 'Enjoys Exploring the City', 'Loves Study Groups', 'Prefers Alone Time for Studying', 'Enjoys Decorating Shared Spaces', 'Low-Interaction Preference', 'High-Interaction Preference', 'Prefer Own Food Storage', 'Likes Shared Meals', 'Regular Gym Visits', 'Prefers Less Outdoor Activities', 'Smoking', 'Drinking', 'Non-Smoking', 'Non-Drinking', 'Comfortable with Pets'] as $preference)
            <option value="{{ $preference }}" {{ old('pref4', $user->profile->pref4 ?? '') == $preference ? 'selected' : '' }}>
                {{ $preference }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="pref5">Preference 5:</label>
    <select name="pref5" id="pref5" class="form-control">
        <option value="">Select Preference 5</option>
        @foreach(['Quiet Environment', 'Social Events', 'Outdoor Activities', 'Indoor Activities', 'Teamwork', 'Independent', 'Hands-on', 'Clean & Tidy Space', 'Shared Cooking', 'Structured Study Time', 'Spontaneous & Flexible', 'Music On Most of the Time', 'Prefer Silence/Quiet', 'Likes Hosting Guests', 'Prefers Minimal Guests', 'Regular Cleaning Schedule', 'Chill Weekend Activities', 'Enjoys Exploring the City', 'Loves Study Groups', 'Prefers Alone Time for Studying', 'Enjoys Decorating Shared Spaces', 'Low-Interaction Preference', 'High-Interaction Preference', 'Prefer Own Food Storage', 'Likes Shared Meals', 'Regular Gym Visits', 'Prefers Less Outdoor Activities', 'Smoking', 'Drinking', 'Non-Smoking', 'Non-Drinking', 'Comfortable with Pets'] as $preference)
            <option value="{{ $preference }}" {{ old('pref5', $user->profile->pref5 ?? '') == $preference ? 'selected' : '' }}>
                {{ $preference }}
            </option>
        @endforeach
    </select>
</div>


                <br>
                <button type="submit" class="btn btn-primary btn-lg">Update Profile</button>
            </form>

            <!-- Delete account form -->
            <form action="{{ route('profile.requestDelete') }}" method="GET" class="mt-4">
                <button type="submit" class="btn btn-danger btn-lg">Request Account Deletion</button>
            </form>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stateSelect = document.getElementById('state');
        const districtSelect = document.getElementById('district');

        // Prepopulate district dropdown if a state is selected (for edit form)
        const selectedState = stateSelect.value;
        if (selectedState) {
            populateDistricts(selectedState);
        }

        // Populate districts when a state is selected
        stateSelect.addEventListener('change', function () {
            const stateName = this.value;
            populateDistricts(stateName);
        });

        function populateDistricts(stateName) {
            // Clear previous options
            districtSelect.innerHTML = '<option value="">Select District</option>';

            if (stateName) {
                fetch(`/districts-by-state/${stateName}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(district => {
                            const option = document.createElement('option');
                            option.value = district.name;
                            option.textContent = district.name;
                            if (district.name === "{{ old('home', $user->profile->home ?? '') }}") {
                                option.selected = true;
                            }
                            districtSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching districts:', error));
            }
        }
    });
    </script>
    @endsection
