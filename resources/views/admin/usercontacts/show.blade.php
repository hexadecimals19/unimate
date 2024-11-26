@extends('adminlte::page')

@section('title', 'User Contact Details')

@section('content_header')
<div class="text-center my-4">
    <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" class="img-fluid" style="max-width: 150px;">
    <h2 class="mt-3 text-dark fw-bold">Unimate Admin System</h2>
    <h1 class="mt-2 text-dark fw-bold">User Contact Details</h1>
</div>
@endsection

@section('content')
    <div class="card shadow-lg border-0 rounded-4 mb-4">
        <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center rounded-top">
            <h3 class="card-title fw-bold mb-0 text-white"><i class="fas fa-address-card text-white"></i> User Contact Information</h3>
        </div>
        <div class="card-body p-4">
            <!-- Displaying Student Profile Image -->
            <div class="text-center mb-4">
                <h5 class="mb-3 text-info fw-bold"><i class="fas fa-image"></i> Profile Image</h5>
                @if ($contact->user && $contact->user->studentimage)
                    <img src="{{ route('student.image', ['filename' => basename($contact->user->studentimage)]) }}"
                         alt="Student Image" class="img-thumbnail rounded-circle shadow-sm mb-3" width="200">
                @else
                    <p>No image available</p>
                @endif
            </div>

            <!-- Displaying User Contact Details -->
            <div class="row mb-4">
                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm rounded-4 p-3">
                        <strong>User ID:</strong> <span class="text-dark">{{ $contact->user_id }}</span>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm rounded-4 p-3">
                        <strong>Student Name:</strong> {{ $contact->user ? $contact->user->name : 'N/A' }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm rounded-4 p-3">
                        <strong>Phone Number:</strong> {{ $contact->phone_number }}
                        <span class="badge {{ $contact->show_phone_number ? 'bg-success' : 'bg-secondary' }}">{{ $contact->show_phone_number ? 'Visible' : 'Hidden' }}</span>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm rounded-4 p-3">
                        <strong>WhatsApp:</strong> {{ $contact->whatsapp }}
                        <span class="badge {{ $contact->show_whatsapp ? 'bg-success' : 'bg-secondary' }}">{{ $contact->show_whatsapp ? 'Visible' : 'Hidden' }}</span>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm rounded-4 p-3">
                        <strong>Telegram:</strong> {{ $contact->telegram }}
                        <span class="badge {{ $contact->show_telegram ? 'bg-success' : 'bg-secondary' }}">{{ $contact->show_telegram ? 'Visible' : 'Hidden' }}</span>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm rounded-4 p-3">
                        <strong>Facebook Profile:</strong> {{ $contact->facebook_profile }}
                        <span class="badge {{ $contact->show_facebook_profile ? 'bg-success' : 'bg-secondary' }}">{{ $contact->show_facebook_profile ? 'Visible' : 'Hidden' }}</span>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm rounded-4 p-3">
                        <strong>Twitter Profile:</strong> {{ $contact->twitter_profile }}
                        <span class="badge {{ $contact->show_twitter_profile ? 'bg-success' : 'bg-secondary' }}">{{ $contact->show_twitter_profile ? 'Visible' : 'Hidden' }}</span>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm rounded-4 p-3">
                        <strong>Instagram Profile:</strong> {{ $contact->instagram_profile }}
                        <span class="badge {{ $contact->show_instagram_profile ? 'bg-success' : 'bg-secondary' }}">{{ $contact->show_instagram_profile ? 'Visible' : 'Hidden' }}</span>
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <div class="text-center">
                <a href="{{ route('admin.usercontacts.index') }}" class="btn btn-primary btn-lg rounded-pill shadow-sm">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15); /* Soft shadow for a modern look */
        }

        .card-body img {
            transition: transform 0.3s ease; /* Smooth scaling effect on hover */
        }

        .card-body img:hover {
            transform: scale(1.1); /* Slight zoom-in effect on image hover */
        }

        .badge {
            font-size: 1rem; /* Adjust badge font size for better readability */
        }

        .btn-primary {
            transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition for buttons */
        }

        .btn-primary:hover {
            background-color: #0056b3;
            color: #ffffff;
        }

        .text-center {
            text-align: center !important; /* Ensure text alignment for all child elements */
        }
    </style>
@endsection

@section('js')
    <script>
        console.log('User Contact Details Page Loaded');
    </script>
@endsection
