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
    <h2 class="h4 fw-bold text-dark">{{ __('Student Login') }}</h2>
</div>


        <!-- Form Section -->
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Field -->
                <div class="mb-3">
                    <label for="studentemail" class="form-label text-muted">{{ __('Student Email Address') }}</label>
                    <input id="studentemail" type="email" class="form-control @error('studentemail') is-invalid @enderror" name="studentemail" value="{{ old('studentemail') }}" required autocomplete="studentemail" autofocus>

                    @error('studentemail')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-3">
                    <label for="password" class="form-label text-muted">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <!-- Remember Me Checkbox -->
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                </div>

                <!-- Submit Button & Forgot Password Link -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">
                        {{ __('Login') }}
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
