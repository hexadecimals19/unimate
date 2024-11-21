@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- College Information Card -->
    <div class="card border-0 shadow-lg rounded-4 mb-5">
        <div class="card-body text-center p-5">
            <!-- College Name -->
            <h2 class="fw-bold mb-4">{{ $college->collegename }}</h2>

            <!-- College Image -->
            <div class="d-flex justify-content-center">
                <img src="{{ asset($college->collegeimage) }}" alt="{{ $college->collegename }}" class="img-fluid img-frame rounded-4 mb-4" style="max-width: 300px;">
            </div>

            <!-- Button to show students registered in the college -->
            <a href="{{ route('colleges.students', $college->id) }}" class="btn btn-primary btn-lg px-4 mt-3">
                <i class="bi bi-people-fill me-2"></i>View Registered Students
            </a>
        </div>
    </div>

    <!-- College Description Card -->
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <h4 class="fw-bold mb-3">About {{ $college->collegename }}</h4>
            <p class="text-muted">{{ $college->collegedesc }}</p>
        </div>
    </div>
</div>
@endsection

<!-- Custom CSS -->
<style>
    .img-frame {
        border: 5px solid #e9ecef; /* Light grey to match Bootstrap colors */
        padding: 10px;
        background-color: #ffffff;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
</style>
