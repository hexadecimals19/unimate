@extends('adminlte::page')

@section('title', 'Admin Dashboard')

@section('content_header')
<div class="text-center my-4">
    <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" class="img-fluid" style="max-width: 150px;">
    <h2 class="mt-3">Unimate Admin System</h2>
    <h1 class="mt-2">Dashboard</h1>

    <!-- Date and Time in Malaysia -->
    <p id="malaysia-time" class="mt-3 lead text-black"></p>
</div>
@endsection

@section('content')
    <div class="container">
        <div class="row g-4">
            <!-- Welcome Card -->
            <div class="col-lg-12">
                <div class="card shadow-lg border-0 rounded-4 bg-gradient">
                    <div class="card-header text-center bg-primary text-white rounded-top">
                        <!-- Centered Icon -->
                        <span class="d-block mb-3">
                            <i class="fas fa-user-shield fa-3x"></i>
                        </span>
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center text-center">
                        <p class="lead text-white mb-0">Welcome to the Unimate Admin System</p>
                    </div>
                </div>
            </div>

            <!-- Total Students Card -->
            <div class="col-lg-4">
                <div class="card bg-success text-white shadow-lg border-0 rounded-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Total Students Registered</h3>
                        <span><i class="fas fa-users fa-2x"></i></span>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <p class="display-4 mb-0">{{ $totalStudents }}</p>
                        <a href="{{ route('admin.students.index') }}" class="btn btn-light fw-bold">View Students</a>
                    </div>
                </div>
            </div>

            <!-- Total Male Students Card -->
            <div class="col-lg-4">
                <div class="card bg-primary text-white shadow-lg border-0 rounded-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Total Male Students</h3>
                        <span><i class="fas fa-male fa-2x"></i></span>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <p class="display-4 mb-0">{{ $totalMaleStudents }}</p>
                        <a href="{{ route('admin.students.index', ['gender' => 'male']) }}" class="btn btn-light fw-bold">View Male Students</a>
                    </div>
                </div>
            </div>

            <!-- Total Female Students Card -->
            <div class="col-lg-4">
                <div class="card bg-pink text-white shadow-lg border-0 rounded-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Total Female Students</h3>
                        <span><i class="fas fa-female fa-2x"></i></span>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <p class="display-4 mb-0">{{ $totalFemaleStudents }}</p>
                        <a href="{{ route('admin.students.index', ['gender' => 'female']) }}" class="btn btn-light fw-bold">View Female Students</a>
                    </div>
                </div>
            </div>

            <!-- Total Colleges Card -->
            <div class="col-lg-6">
                <div class="card bg-info text-white shadow-lg border-0 rounded-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Total Colleges Registered</h3>
                        <span><i class="fas fa-university fa-2x"></i></span>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <p class="display-4 mb-0">{{ $totalColleges }}</p>
                        <a href="{{ route('admin.colleges.index') }}" class="btn btn-light fw-bold">View Colleges</a>
                    </div>
                </div>
            </div>

            <!-- Total Reviews Card -->
            <div class="col-lg-6">
                <div class="card bg-warning text-white shadow-lg border-0 rounded-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0 text-white">Total Reviews Made</h3>
                        <span class="text-white">
                            <i class="fas fa-star fa-2x"></i>
                        </span>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <p class="display-4 mb-0 text-white">{{ $totalReviews }}</p>
                        <a href="{{ route('admin.reviews.index') }}" class="btn btn-light fw-bold">View Reviews</a>
                    </div>
                </div>
            </div>

            <!-- Total Roommate Applications Card -->
            <div class="col-lg-6">
                <div class="card bg-danger text-white shadow-lg border-0 rounded-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Total Roommate Applications Made</h3>
                        <span><i class="fas fa-home fa-2x"></i></span>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <p class="display-4 mb-0">{{ $totalRoommateApplications }}</p>
                        <a href="{{ route('admin.applications.index') }}" class="btn btn-light fw-bold">View Applications</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('right-sidebar')
    <!-- Logout Button -->
    <a class="dropdown-item" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
@endsection

@section('css')
    <style>
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background: linear-gradient(to right, #4e73df, #224abe);
            border-radius: 10px 10px 0 0;
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: 700;
        }
        .icon-container i {
            color: #fff;
        }
        .lead {
            font-size: 1.25rem;
            color: #6c757d;
        }
        .bg-gradient {
            background: linear-gradient(135deg, #6c5ce7, #00b894);
            border-radius: 12px;
        }
    </style>
@endsection

@section('js')
    <script>
        // JavaScript to show the current date and time in Malaysia Time (GMT+8)
        function updateMalaysiaTime() {
            // Create a new date object for Malaysia time (GMT+8)
            var options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: true
            };

            // Get the current time in Malaysia time zone (GMT+8)
            var malaysiaTime = new Date().toLocaleString("en-US", { timeZone: "Asia/Kuala_Lumpur", ...options });

            // Display the date and time in the #malaysia-time element
            document.getElementById("malaysia-time").innerText = malaysiaTime;
        }

        // Update the time every second
        setInterval(updateMalaysiaTime, 1000);

        // Initialize the time when the page loads
        updateMalaysiaTime();
    </script>
@endsection
