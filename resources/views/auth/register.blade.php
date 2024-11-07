@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Student Register') }}</div>

                <div class="mt-4 text-center">
                    <img src="{{ asset('images/unimatelogo.png') }}" alt="Description of the image" class="img-fluid" style="max-width: 150px;">
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Student ID Field -->
                        <div class="row mb-3">
                            <label for="studentid" class="col-md-4 col-form-label text-md-end">{{ __('Student ID') }}</label>

                            <div class="col-md-6">
                                <input id="studentid" type="text" class="form-control @error('studentid') is-invalid @enderror" name="studentid" value="{{ old('studentid') }}" required autocomplete="studentid" autofocus>

                                @error('studentid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Name Field -->
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Student Email Field -->
                        <div class="row mb-3">
                            <label for="studentemail" class="col-md-4 col-form-label text-md-end">{{ __('Student Email') }}</label>

                            <div class="col-md-6">
                                <input id="studentemail" type="email" class="form-control @error('studentemail') is-invalid @enderror" name="studentemail" value="{{ old('studentemail') }}" required autocomplete="studentemail">

                                @error('studentemail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Student Gender Field -->
                        <div class="row mb-3">
                            <label for="studentgender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <select id="studentgender" class="form-control @error('studentgender') is-invalid @enderror" name="studentgender" required>
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="male" {{ old('studentgender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('studentgender') == 'female' ? 'selected' : '' }}>Female</option>
                                </select>

                                @error('studentgender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
