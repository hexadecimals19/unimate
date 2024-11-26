@extends('adminlte::page')

@section('title', 'Application Details')

@section('content_header')
    <h1>Application Details</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Roommate Application</h3>
        </div>


            <!-- Display Application Details -->
            <div class="row">
                <div class="col-md-6">
                    <strong>Applicant:</strong> {{ $application->applicant->name }}
                </div>
                <div class="col-md-6">
                    <strong>Roommate:</strong> {{ $application->roommate->name }}
                </div>
                <div class="col-md-6">
                    <strong>Status:</strong> {{ $application->status }}
                </div>
            </div>
            <hr>
            <div class="text-center">
                <h5 class="mb-3"><i class="fas fa-image"></i> Applicant Image</h5>
                <img src="{{ route('student.image', ['filename' => basename($application->applicant->studentimage)]) }}" alt="Applicant Image" class="img-thumbnail rounded" width="200">
                <h5 class="mt-3 mb-3"><i class="fas fa-image"></i> Roommate Image</h5>
                <img src="{{ route('student.image', ['filename' => basename($application->roommate->studentimage)]) }}" alt="Roommate Image" class="img-thumbnail rounded" width="200">
            </div>


            <div class="card-body">
                <div class="mb-4">
                    <a href="{{ route('admin.applications.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Applications List
                    </a>
                </div>
        </div>
    </div>
@endsection
