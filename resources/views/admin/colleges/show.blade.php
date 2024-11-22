@extends('adminlte::page')

@section('title', 'View College')

@section('content_header')
    <div class="text-center my-4">
        <h1>View College</h1>
    </div>
@endsection

@section('content')
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-5 text-center">
            <!-- College Name -->
            <h2 class="fw-bold mb-4">{{ $college->collegename }}</h2>

            <!-- College Image -->
            @if($college->collegeimage)
                <img src="{{ asset($college->collegeimage) }}" alt="{{ $college->collegename }}" class="img-fluid mb-4 rounded shadow-sm" style="max-width: 300px;">
            @else
                <div class="mb-4">
                    <p class="text-muted">No image available</p>
                </div>
            @endif

            <!-- College Type and Description -->
            <div class="mb-4">
                <p class="lead"><strong>College Type:</strong> {{ $college->collegetype }}</p>
                <p class="lead"><strong>College Description:</strong> {{ $college->collegedesc }}</p>
            </div>

            <!-- Created At and Updated At -->
            <div class="mb-4 text-muted">
                <p><strong>Created At:</strong> {{ $college->created_at->format('Y-m-d H:i') }}</p>
                <p><strong>Last Updated:</strong> {{ $college->updated_at->format('Y-m-d H:i') }}</p>
            </div>

            <!-- Back Button -->
            <a href="{{ route('admin.colleges.index') }}" class="btn btn-primary btn-lg px-5 shadow">
                <i class="fas fa-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>
@endsection
