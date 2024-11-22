@extends('adminlte::page')

@section('title', 'Manage Students')

@section('content_header')
    <div class="text-center my-4">
        <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" class="img-fluid" style="max-width: 150px;">
        <h2 class="mt-3">Unimate Admin System</h2>
        <h1 class="mt-2">Manage Students</h1>
    </div>
@endsection

@section('content')
<!-- Search Form Card -->
<div class="card shadow-lg border-0 rounded-4 mb-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Search Students</h5>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('admin.students.index') }}">
            <div class="row g-3 align-items-end">
                <!-- Row 1 -->
                <!-- Search by Name -->
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" name="name" class="form-control" id="searchName" placeholder="Search by Name" value="{{ request('name') }}">
                    </div>
                </div>

                <!-- Search by Student ID -->
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" name="studentid" class="form-control" id="searchStudentId" placeholder="Search by Student ID" value="{{ request('studentid') }}">
                    </div>
                </div>

                <!-- Search by Email -->
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" name="email" class="form-control" id="searchEmail" placeholder="Search by Email" value="{{ request('email') }}">
                    </div>
                </div>
            </div>

            <div class="row g-3 align-items-end mt-3">
                <!-- Row 2 -->
                <!-- Search by College -->
                <div class="col-md-4">
                    <div class="form-floating">
                        <select name="college" id="studentcollege" class="form-control form-select">
                            <option value="" selected>Select College</option>
                            @foreach($colleges as $college)
                                <option value="{{ $college->collegename }}" {{ request('college') == $college->collegename ? 'selected' : '' }}>
                                    {{ $college->collegename }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Search by Gender -->
                <div class="col-md-4">
                    <div class="form-floating">
                        <select name="gender" class="form-control form-select" id="searchGender">
                            <option value="" selected>Search by Gender</option>
                            <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                </div>

                <!-- Search Button -->
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary form-control">
                        <i class="fas fa-search"></i> Search
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>





    <!-- Students Table Card -->
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Student List</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Email Verified At</th>
                            <th>Email Verification Code</th>
                            <th>College</th>
                            <th>Student ID</th>
                            <th>Gender</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->studentemail }}</td>
                                <td>
                                    @if ($user->email_verified_at)
                                        <span class="badge bg-success">{{ $user->email_verified_at->format('Y-m-d H:i') }}</span>
                                    @else
                                        <span class="badge bg-secondary">Not Verified</span>
                                    @endif
                                </td>
                                <td>{{ $user->verification_code ?? 'N/A' }}</td>
                                <td>{{ $user->studentcollege }}</td>
                                <td>{{ $user->studentid }}</td>
                                <td>{{ ucfirst($user->studentgender) }}</td>
                                <td>{{ ucfirst($user->role) }}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('admin.students.show', $user->id) }}" class="btn btn-sm btn-info mx-1">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="{{ route('admin.students.edit', $user->id) }}" class="btn btn-sm btn-warning mx-1">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.students.destroy', $user->id) }}" method="POST" class="mx-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center text-muted">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
