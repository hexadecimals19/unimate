@extends('adminlte::page')

@section('title', 'Manage Colleges')

@section('content_header')
    <div class="mt-4 text-center">
        <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" class="img-fluid" style="max-width: 150px;">
        <h2 class="mt-3">Unimate Admin System</h2>
        <h1 class="mt-2">Manage Colleges</h1>
    </div>
@endsection

@section('content')
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
            <h3 class="card-title mb-0">College List</h3>
            <div class="card-tools">
                <a href="{{ route('admin.colleges.create') }}" class="btn btn-light btn-sm text-primary fw-bold">
                    <i class="fas fa-plus-circle"></i> Add New College
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>College Name</th>
                        <th>College Type</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($colleges as $college)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $college->collegename }}</td>
                            <td>{{ $college->collegetype }}</td>
                            <td>{{ Str::limit($college->collegedesc, 50) }}</td>
                            <td>{{ $college->created_at->format('Y-m-d H:i') }}</td>
                            <td>{{ $college->updated_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.colleges.show', $college->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <a href="{{ route('admin.colleges.edit', $college->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.colleges.destroy', $college->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this college?')">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No colleges found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
