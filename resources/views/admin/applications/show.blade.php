@extends('adminlte::page')

@section('title', 'Application Details')

@section('content_header')
<div class="text-center my-4">
    <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" class="img-fluid" style="max-width: 150px;">
    <h2 class="mt-3 text-dark fw-bold">Unimate Admin System</h2>
    <h1 class="mt-2 text-dark fw-bold">Application Details</h1>
</div>
@endsection

@section('content')
    <div class="card shadow-lg border-0 rounded-4 mb-4">
        <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center rounded-top">
            <h3 class="card-title fw-bold mb-0 text-white">
                <i class="fas fa-users text-white"></i> Roommate Application
            </h3>
        </div>

        <div class="card-body p-4">
            <div class="row mb-4">
                <!-- Applicant Information Card -->
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm rounded-4 text-center">
                        <div class="card-body">
                            <h5 class="card-title mb-3 text-primary fw-bold"><i class="fas fa-user"></i> Applicant</h5>
                            <img src="{{ route('student.image', ['filename' => basename($application->applicant->studentimage)]) }}"
                                 alt="Applicant Image" class="img-thumbnail rounded-circle mb-3" width="150">
                            <p class="card-text fw-bold text-dark" style="font-size: 1.2rem;">{{ $application->applicant->name }}</p>
                        </div>
                    </div>
                </div>

                <!-- Roommate Information Card -->
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm rounded-4 text-center">
                        <div class="card-body">
                            <h5 class="card-title mb-3 text-success fw-bold"><i class="fas fa-user-friends"></i> Roommate</h5>
                            <img src="{{ route('student.image', ['filename' => basename($application->roommate->studentimage)]) }}"
                                 alt="Roommate Image" class="img-thumbnail rounded-circle mb-3" width="150">
                            <p class="card-text fw-bold text-dark" style="font-size: 1.2rem;">{{ $application->roommate->name }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Application Status Section -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4">
                            <h5 class="card-title text-info fw-bold mb-3"><i class="fas fa-info-circle"></i> Application Information</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Status:</strong>
                                        <span class="badge {{ $application->status == 'pending' ? 'bg-warning text-dark' : ($application->status == 'accepted' ? 'bg-success' : 'bg-danger') }}">
                                            {{ ucfirst($application->status) }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <div class="mt-4 text-center">
                <a href="{{ route('admin.applications.index') }}" class="btn btn-primary btn-lg rounded-pill shadow-sm">
                    <i class="fas fa-arrow-left"></i> Back to Applications List
                </a>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15); /* Soft shadow for a modern look */
        }

        .card-body img {
            transition: transform 0.3s ease; /* Smooth scaling effect on hover */
        }

        .card-body img:hover {
            transform: scale(1.1); /* Slight zoom-in effect on image hover */
        }

        .card-title {
            font-size: 1.25rem;
            color: #007bff; /* Slightly brighter color for visual distinction */
        }

        .card-text {
            font-size: 1.3rem; /* Larger font size for better visibility */
            font-weight: bold; /* Make the name bold */
            color: #333; /* Darker color for better contrast */
        }

        .badge {
            font-size: 1rem; /* Adjust badge font size for better readability */
        }

        .btn-primary {
            transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition for buttons */
        }

        .btn-primary:hover {
            background-color: #0056b3;
            color: #ffffff;
        }

        .text-center {
            text-align: center !important; /* Ensure text alignment for all child elements */
        }
    </style>
@endsection

@section('js')
    <script>
        console.log('Application Details Page Loaded');
    </script>
@endsection
