@extends('adminlte::page')

@section('title', 'Create New College')

@section('content_header')
    <div class="text-center my-4">
        <h1>Create New College</h1>
    </div>
@endsection

@section('content')
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-5">
            <!-- Display Success or Error Messages -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- College Create Form -->
            <form action="{{ route('admin.colleges.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- College Name -->
                <div class="form-group mb-4">
                    <label for="collegename" class="form-label fw-bold">College Name</label>
                    <input type="text" name="collegename" id="collegename" class="form-control border-secondary" value="{{ old('collegename') }}" placeholder="Enter the college name" required>
                </div>

                <!-- College Type Dropdown with Options 1 and 2 -->
                <div class="form-group mb-4">
                    <label for="collegetype" class="form-label fw-bold">College Type</label>
                    <select name="collegetype" id="collegetype" class="form-control border-secondary" required>
                        <option value="">Select College Type</option>
                        <option value="1" {{ old('collegetype') == '1' ? 'selected' : '' }}>Male College</option>
                        <option value="2" {{ old('collegetype') == '2' ? 'selected' : '' }}>Female College</option>
                    </select>
                </div>

                <!-- College Image -->
                <div class="form-group mb-4">
                    <label for="collegeimage" class="form-label fw-bold">College Image</label>
                    <input type="file" name="collegeimage" id="collegeimage" class="form-control border-secondary" accept="image/*">
                    <small class="form-text text-muted mt-1">Please upload an image that represents the college.</small>
                </div>

                <!-- College Description -->
                <div class="form-group mb-4">
                    <label for="collegedesc" class="form-label fw-bold">College Description</label>
                    <textarea name="collegedesc" id="collegedesc" rows="4" class="form-control border-secondary" placeholder="Enter a description of the college" required>{{ old('collegedesc') }}</textarea>
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg px-5 shadow">
                        <i class="fas fa-save me-2"></i>Create College
                    </button>
                    <a href="{{ route('admin.colleges.index') }}" class="btn btn-outline-secondary btn-lg ms-3 px-5 shadow">
                        <i class="fas fa-times-circle me-2"></i>Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
