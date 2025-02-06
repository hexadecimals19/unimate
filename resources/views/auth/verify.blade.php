@extends('layouts.app')

@section('content')

<!-- Main Content -->
<div class="min-vh-100 d-flex justify-content-center align-items-center px-4">
    <!-- Card Section -->
    <div class="card w-100 max-w-md bg-white shadow-lg rounded-lg p-4 p-lg-5">
        <!-- Card Header -->
        <div class="card-header text-center mb-4">
            <h2 class="h4 fw-bold text-dark">{{ __('Email Verification') }}</h2>
        </div>

        <!-- Form Section -->
        <form method="POST" action="{{ route('verification.verify') }}">
            @csrf

            <!-- Verification Code Field -->
            <div class="mb-3">
                <label for="verification_code" class="form-label text-muted">{{ __('Verification Code') }}:</label>
                <input type="text" id="verification_code" name="verification_code" class="form-control @error('verification_code') is-invalid @enderror" required pattern="\d{6}" title="Please enter a 6-digit code" maxlength="6">

                @error('verification_code')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-100 btn btn-primary btn-lg">
                {{ __('Verify Email') }}
            </button>
        </form>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="mt-4 text-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>

@endsection
