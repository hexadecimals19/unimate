@extends('adminlte::page')

@section('title', 'Manage Applications')

@section('content_header')
    <h1>Manage Applications</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Roommate Applications</h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Application ID</th> <!-- Display Application ID -->
                        <th>Applicant ID</th> <!-- Display Applicant ID -->
                        <th>Roommate ID</th> <!-- Display Roommate ID -->
                        <th>Applicant</th> <!-- Display Applicant's name -->
                        <th>Roommate</th> <!-- Display Roommate's name -->
                        <th>Status</th> <!-- Display Status -->
                        <th>Actions</th> <!-- Display Actions -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applications as $application)
                        <tr>
                            <td>{{ $loop->iteration }}</td> <!-- Iteration number -->
                            <td>{{ $application->id }}</td> <!-- Display the Application ID -->
                            <td>{{ $application->applicant_id }}</td> <!-- Display the Applicant ID -->
                            <td>{{ $application->roommate_id }}</td> <!-- Display the Roommate ID -->
                            <td>{{ $application->applicant->name }}</td> <!-- Assuming 'applicant' relationship is defined -->
                            <td>{{ $application->roommate->name }}</td> <!-- Assuming 'roommate' relationship is defined -->
                            <td>{{ ucfirst($application->status) }}</td> <!-- Display the Status with proper case -->
                            <td>
                                <a href="{{ route('admin.applications.show', $application->id) }}" class="btn btn-info btn-sm">View</a>
                                <form action="{{ route('admin.applications.destroy', $application->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this application?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
