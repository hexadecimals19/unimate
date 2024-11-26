@extends('adminlte::page')

@section('title', 'Manage Reviews')

@section('content_header')
    <div class="mt-4 text-center">
        <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" class="img-fluid" style="max-width: 150px;">
        <h2 class="mt-3">Unimate Admin System</h2>
        <h1 class="mt-2">Manage Reviews</h1>
    </div>
@endsection

@section('content')
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
            <h3 class="card-title mb-0">Review List</h3>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Review ID</th> <!-- Display Review ID -->
                        <th>User ID (Review Issuer)</th> <!-- Display User ID -->
                        <th>Roommate ID</th> <!-- Display Roommate ID -->
                        <th>User (Review Issuer)</th> <!-- Display User's name -->
                        <th>Roommate</th> <!-- Display Roommate's name -->
                        <th>Rating</th>
                        <th>Review</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reviews as $review)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $review->id }}</td> <!-- Display the review ID -->
                            <td>{{ $review->user_id }}</td> <!-- Display the user_id -->
                            <td>{{ $review->roommate_id }}</td> <!-- Display the roommate_id -->
                            <td>{{ $review->user->name }}</td> <!-- Assuming 'user' relationship is defined -->
                            <td>{{ $review->roommate->name }}</td> <!-- Assuming 'roommate' relationship is defined -->
                            <td>{{ $review->rating }}</td>
                            <td>{{ Str::limit($review->review, 50) }}</td>
                            <td>{{ $review->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.reviews.show', $review->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this review?')">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center text-muted">No reviews found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
