<!-- resources/views/profile/verify_delete.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header">
            <h1 class="mb-0">Verify Account Deletion</h1>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <p>Please enter the verification code sent to your email to confirm account deletion.</p>

            <form action="{{ route('profile.verifyDelete') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="verification_code">Verification Code:</label>
                    <input type="text" name="verification_code" id="verification_code" class="form-control" required>
                </div>
                <br>
                <button type="submit" class="btn btn-danger">Confirm Account Deletion</button>
            </form>
        </div>
    </div>
</div>
@endsection
