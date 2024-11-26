@extends('adminlte::page')

@section('title', 'View College')

@section('content_header')
<div class="text-center my-4">
    <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" class="img-fluid" style="max-width: 150px;">
    <h2 class="mt-3 text-dark fw-bold">Unimate Admin System</h2>
    <h1 class="mt-2 text-dark fw-bold">College Details</h1>
</div>
@endsection

@section('content')
    <div class="card shadow-lg border-0 rounded-4 mb-4">
        <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center rounded-top">
            <h3 class="card-title fw-bold mb-0 text-white"><i class="fas fa-university text-white"></i> College Information</h3>
        </div>
        <div class="card-body p-5 text-center">
            <!-- College Name -->
            <h2 class="fw-bold mb-4 text-dark">{{ $college->collegename }}</h2>

            <!-- College Image -->
            @if($college->collegeimage)
                <img src="{{ asset($college->collegeimage) }}" alt="{{ $college->collegename }}" class="img-fluid mb-4 rounded shadow-sm" style="max-width: 400px;">
            @else
                <div class="mb-4">
                    <p class="text-muted">No image available</p>
                </div>
            @endif

            <!-- College Type and Description -->
            <div class="row justify-content-center mb-4">
                <div class="col-md-8">
                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-3">
                        <p class="lead mb-1"><strong>College Type:</strong>
                            <span class="{{ $college->collegetype == 1 ? 'text-primary' : ($college->collegetype == 2 ? 'text-pink' : 'text-muted') }}">
                                @if($college->collegetype == 1)
                                    <i class="fas fa-mars text-primary"></i> Male
                                @elseif($college->collegetype == 2)
                                    <i class="fas fa-venus text-pink"></i> Female
                                @else
                                    <i class="fas fa-question-circle text-muted"></i> Unknown
                                @endif
                            </span>
                        </p>

                    </div>
                    <div class="card border-0 shadow-sm rounded-4 p-4">
                        <p class="lead mb-1"><strong>College Description:</strong> {{ $college->collegedesc }}</p>
                    </div>
                </div>
            </div>

            <!-- Created At and Updated At -->
            <div class="text-muted">
                <p><strong>Created At:</strong> {{ $college->created_at->format('Y-m-d H:i') }}</p>
                <p><strong>Last Updated:</strong> {{ $college->updated_at->format('Y-m-d H:i') }}</p>
            </div>

            <!-- Back Button -->
            <div class="mt-4">
                <a href="{{ route('admin.colleges.index') }}" class="btn btn-primary btn-lg rounded-pill shadow-sm px-5">
                    <i class="fas fa-arrow-left me-2"></i> Back to List
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
            transform: scale(1.05); /* Slight zoom-in effect on image hover */
        }

        .card-title {
            font-size: 1.5rem;
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
        console.log('View College Page Loaded');
    </script>
@endsection
