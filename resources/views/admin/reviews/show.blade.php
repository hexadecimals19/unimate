@extends('adminlte::page')

@section('title', 'Review Details')

@section('content_header')
    <div class="mt-4 text-center">
        <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" class="img-fluid" style="max-width: 150px;">
        <h2 class="mt-3">Unimate Admin System</h2>
        <h1 class="mt-2">Review Details</h1>
    </div>
@endsection

@section('content')
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title mb-0">Review Details</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>User (Review Issuer):</strong> {{ $review->user->name }}</p>
                    <!-- Display User Image -->
                    <div class="text-center">
                        <h5 class="mb-3"><i class="fas fa-image"></i> User Profile Image</h5>
                        <img src="{{ route('student.image', ['filename' => basename($review->user->studentimage)]) }}"
                             alt="User Image" class="img-thumbnail rounded" width="200">
                    </div>
                </div>
                <div class="col-md-6">
                    <p><strong>Roommate:</strong> {{ $review->roommate->name }}</p>
                    <!-- Display Roommate Image -->
                    <div class="text-center">
                        <h5 class="mb-3"><i class="fas fa-image"></i> Roommate Profile Image</h5>
                        <img src="{{ route('student.image', ['filename' => basename($review->roommate->studentimage)]) }}"
                             alt="Roommate Image" class="img-thumbnail rounded" width="200">
                    </div>
                    <p><strong>Rating:</strong> {{ $review->rating }}</p>
                    <p><strong>Review:</strong> {{ $review->review }}</p>
                    <p><strong>Created At:</strong> {{ $review->created_at->format('Y-m-d H:i') }}</p>
                    <p><strong>Updated At:</strong> {{ $review->updated_at->format('Y-m-d H:i') }}</p>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('admin.reviews.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Back to Reviews
                </a>
            </div>
        </div>
    </div>
@endsection
