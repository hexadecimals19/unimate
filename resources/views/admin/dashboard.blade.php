@extends('adminlte::page')

@section('title', 'Admin Dashboard')

@section('content_header')
    <h1 class="text-center mb-4">Admin Dashboard</h1>
@endsection

@section('content')
    <div class="container">
        <div class="row g-4">
            <!-- Welcome Card -->
            <div class="col-lg-12">
                <div class="card shadow-lg border-0 rounded-5">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Welcome, Admin!</h3>
                        <span><i class="fas fa-user-shield fa-2x"></i></span>
                    </div>
                    <div class="card-body">
                        <p class="lead">This is your admin dashboard</p>
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .main-sidebar {
            height: 100vh; /* Full viewport height */
            overflow-y: auto; /* Allow scrolling if content overflows */
            background-color: #dff6ff; /* Light blue background */
            color: #000000; /* Black text */
        }

        .main-sidebar .nav-sidebar .nav-item .nav-link {
            color: #0056b3; /* Link color */
        }

        .main-sidebar .nav-sidebar .nav-item .nav-link:hover {
            background-color: #b3e0ff; /* Hover effect */
            color: #000000; /* Hover text color */
        }

        .main-sidebar .brand-link {
            height: 60px; /* Adjust height for logo section */
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            background-color: #b3e0ff; /* Dark blue */
            color: #0056b3; /* Link color */
        }
    </style>
@endsection

@section('js')
    <script>
        console.log('Admin Dashboard Loaded!');
    </script>
@endsection
