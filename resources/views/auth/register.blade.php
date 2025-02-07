@extends('layouts.app')

@section('content')

<!-- Main Content -->
<div class="min-vh-100 d-flex justify-content-center align-items-center px-4">
    <!-- Card Section -->
    <div class="card w-100 max-w-md bg-white shadow-lg rounded-lg p-4 p-lg-5">
          <!-- Logo Section -->
          <div class="mb-4 text-center">
            <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" class="img-fluid mx-auto" style="max-width: 120px;">
        </div>
        <!-- Card Header -->
        <div class="card-header text-center mb-4">
            <h2 class="h4 fw-bold text-dark">{{ __('Student Register') }}</h2>
        </div>


        <!-- Form Section -->
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Student ID Field -->
                <div class="mb-3">
                    <label for="studentid" class="form-label text-muted">{{ __('Student ID') }}</label>
                    <input id="studentid" type="text" class="form-control @error('studentid') is-invalid @enderror" name="studentid" value="{{ old('studentid') }}" required autocomplete="studentid" autofocus>
                    @error('studentid')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <!-- Name Field -->
                <div class="mb-3">
                    <label for="name" class="form-label text-muted">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
                    @error('name')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <!-- Student Email Field -->
                <div class="mb-3">
                    <label for="studentemail" class="form-label text-muted">{{ __('Student Email') }}</label>
                    <input id="studentemail" type="email" class="form-control @error('studentemail') is-invalid @enderror" name="studentemail" value="{{ old('studentemail') }}" required autocomplete="studentemail">
                    @error('studentemail')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <!-- Student Gender Field -->
                <div class="mb-3">
                    <label for="studentgender" class="form-label text-muted">{{ __('Gender') }}</label>
                    <select id="studentgender" class="form-select @error('studentgender') is-invalid @enderror" name="studentgender" required>
                        <option value="" disabled selected>{{ __('Select Gender') }}</option>
                        <option value="male" {{ old('studentgender') == 'male' ? 'selected' : '' }}>{{ __('Male') }}</option>
                        <option value="female" {{ old('studentgender') == 'female' ? 'selected' : '' }}>{{ __('Female') }}</option>
                    </select>
                    @error('studentgender')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-3">
                    <label for="password" class="form-label text-muted">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-3">
                    <label for="password-confirm" class="form-label text-muted">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <!-- Submit Button -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">
                        {{ __('Register') }}
                    </button>
                </div>

                                <!-- Consent Message Link -->
                                <div class="mt-3 text-center">
                                    <a href="{{ asset('pdf/consent_message.pdf') }}" target="_blank" class="text-muted">
                                        {{ __('Read the Consent Message') }}
                                    </a>
                                </div>
            </form>
        </div>
    </div>
</div>

@endsection
