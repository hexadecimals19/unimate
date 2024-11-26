@extends('adminlte::page')

@section('title', 'View User')

@section('content_header')
<div class="text-center my-4">
    <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" class="img-fluid" style="max-width: 150px;">
    <h2 class="mt-3 text-dark fw-bold">Unimate Admin System</h2>
    <h1 class="mt-2 text-dark fw-bold">View Student Details</h1>
</div>
@endsection

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">{{ $user->name }}'s Details</h3>
        </div>
<br>
                    <!-- Profile Image Section -->
                    @if($user->studentimage)
                    <div class="row mb-4">
                        <div class="col-md-12 text-center">
                            <h5 class="mb-3"><i class="fas fa-image"></i> Profile Image</h5>
                            <img src="{{ route('student.image', ['filename' => basename($user->studentimage)]) }}" alt="Student Image" class="img-thumbnail rounded" width="200">
                        </div>
                    </div>
        <div class="card-body">
            <!-- User Information Section -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <h5 class="mb-3"><i class="fas fa-info-circle"></i> Basic Information</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $user->studentemail }}</td>
                                </tr>
                                <tr>
                                    <th>Email Verified At</th>
                                    <td>{{ $user->email_verified_at ? $user->email_verified_at->format('Y-m-d H:i:s') : 'Not Verified' }}</td>
                                </tr>
                                <tr>
                                    <th>Verification Code</th>
                                    <td>{{ $user->verification_code ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td>{{ ucfirst($user->role) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Student Information Section -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <h5 class="mb-3"><i class="fas fa-university"></i> Student Information</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>College</th>
                                    <td>{{ $user->studentcollege }}</td>
                                </tr>
                                <tr>
                                    <th>Student ID</th>
                                    <td>{{ $user->studentid }}</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>{{ ucfirst($user->studentgender) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            @endif
        </div>
    </div>
@endsection
