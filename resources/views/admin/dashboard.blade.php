@extends('adminlte::page')

@section('title', 'Admin Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <!-- Welcome Card -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Welcome, Admin!</h3>
                    </div>
                    <div class="card-body">
                        <p>This is your admin dashboard.</p>
                    </div>
                </div>
            </div>

            <!-- Example of Admin Features -->
            <div class="col-lg-4">
                <div class="card bg-primary">
                    <div class="card-header">
                        <h3 class="card-title">Manage Users</h3>
                    </div>
                    <div class="card-body">
                        <p>Access user management features here.</p>
                        <a href="#" class="btn btn-light">Go to Users</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-warning">
                    <div class="card-header">
                        <h3 class="card-title">View Reports</h3>
                    </div>
                    <div class="card-body">
                        <p>Check system reports and analytics.</p>
                        <a href="#" class="btn btn-light">View Reports</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-danger">
                    <div class="card-header">
                        <h3 class="card-title">System Settings</h3>
                    </div>
                    <div class="card-body">
                        <p>Configure system-wide settings.</p>
                        <a href="#" class="btn btn-light">Go to Settings</a>
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
    color:  #0056b3; /* Link color */
    ; /* White text */
}
    </style>

@endsection

@section('js')
    <script>
        console.log('Admin Dashboard Loaded!');

    </script>
@endsection
