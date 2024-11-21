@extends('adminlte::page')

@section('title', 'Manage Students')



@section('content_header')
    <div class="mt-4 text-center">
        <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" class="img-fluid" style="max-width: 150px;">
        <h2 class="mt-3">Unimate Admin System</h2> <!-- New text added below the image -->
        <h1 class="mt-2">Manage Students</h1>
    </div>
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Student List</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
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
                            <td>{{ $user->email_verified_at ? $user->email_verified_at->format('Y-m-d H:i:s') : 'Not Verified' }}</td>
                            <td>{{ $user->verification_code ?? 'N/A' }}</td>
                            <td>{{ $user->studentcollege }}</td>
                            <td>{{ $user->studentid }}</td>
                            <td>{{ ucfirst($user->studentgender) }}</td>
                            <td>{{ ucfirst($user->role) }}</td>
                            <td>
                                <a href="{{ route('admin.students.show', $user->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('admin.students.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.students.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
