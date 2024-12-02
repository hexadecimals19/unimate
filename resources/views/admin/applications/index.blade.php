@extends('adminlte::page')

@section('title', 'Manage Roommate Applications')

@section('content_header')
<div class="text-center my-4">
    <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" class="img-fluid" style="max-width: 150px;">
    <h2 class="mt-3 text-dark fw-bold">Unimate Admin System</h2>
    <h1 class="mt-2 text-dark fw-bold">Manage Roommate Applications</h1>
</div>
@endsection

@section('content')
    <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center rounded-top">
            <h3 class="card-title fw-bold mb-0"><i class="fas"></i> Roommate Applications</h3>
        </div>

        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>Application ID</th>
                            <th>Applicant ID</th>
                            <th>Roommate ID</th>
                            <th>Applicant Name</th>
                            <th>Roommate Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $application)
                            <tr class="bg-light">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $application->id }}</td>
                                <td>{{ $application->applicant_id }}</td>
                                <td>{{ $application->roommate_id }}</td>
                                <td class="text-dark fw-bold">{{ $application->applicant ? $application->applicant->name : 'Deleted User' }}</td>
                                <td class="text-dark fw-bold">{{ $application->roommate ? $application->roommate->name : 'Deleted User' }}</td>
                                <td>
                                    <span class="badge
                                        {{ $application->status == 'pending' ? 'bg-warning text-dark' :
                                           ($application->status == 'accepted' ? 'bg-success' :
                                           ($application->status == 'rejected' ? 'bg-danger' : 'bg-secondary')) }}">
                                        {{ ucfirst($application->status) }}
                                    </span>
                                </td>

                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('admin.applications.show', $application->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <form action="{{ route('admin.applications.destroy', $application->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this application?')">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15); /* Soft shadow for modern look */
        }

        .table th, .table td {
            vertical-align: middle; /* Center the text vertically */
        }

        .card-header {
            background: linear-gradient(45deg, #007bff, #0062cc); /* Gradient for modern header look */
        }

        .btn-outline-info, .btn-outline-danger {
            transition: all 0.3s ease; /* Smooth transition for hover effect */
        }

        .btn-outline-info:hover {
            background-color: #17a2b8;
            color: #fff;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: #fff;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1; /* Row hover effect for better UX */
        }
    </style>
@endsection

@section('js')
    <script>
        console.log('Manage Roommate Applications Page Loaded');
    </script>
@endsection
