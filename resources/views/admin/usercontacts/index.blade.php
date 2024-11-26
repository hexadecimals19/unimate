@extends('adminlte::page')

@section('title', 'Manage Student Contacts')

@section('content_header')
<div class="text-center my-4">
    <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" class="img-fluid" style="max-width: 150px;">
    <h2 class="mt-3 text-dark fw-bold">Unimate Admin System</h2>
    <h1 class="mt-2 text-dark fw-bold">Manage Student Contacts</h1>
</div>
@endsection

@section('content')
    <div class="card shadow-sm border-0 rounded-4 mb-4">
        <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center rounded-top">
            <h3 class="card-title fw-bold mb-0"><i class="fas"></i> User Contacts List</h3>
        </div>

        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>Contact ID</th>
                            <th>User ID</th>
                            <th>Student Name</th>
                            <th>Phone Number</th>
                            <th>WhatsApp</th>
                            <th>Telegram</th>
                            <th>Facebook Profile</th>
                            <th>Twitter Profile</th>
                            <th>Instagram Profile</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr class="bg-light">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->user_id }}</td>
                                <td class="text-dark fw-bold">{{ $contact->user ? $contact->user->name : 'N/A' }}</td>
                                <td>{{ $contact->phone_number }}</td>
                                <td>{{ $contact->whatsapp }}</td>
                                <td>{{ $contact->telegram }}</td>
                                <td><a href="{{ $contact->facebook_profile }}" target="_blank" class="text-info">{{ $contact->facebook_profile }}</a></td>
                                <td><a href="{{ $contact->twitter_profile }}" target="_blank" class="text-info">{{ $contact->twitter_profile }}</a></td>
                                <td><a href="{{ $contact->instagram_profile }}" target="_blank" class="text-info">{{ $contact->instagram_profile }}</a></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('admin.usercontacts.show', $contact->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <form action="{{ route('admin.usercontacts.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this contact?')">
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
        console.log('Manage Student Contacts Page Loaded');
    </script>
@endsection
