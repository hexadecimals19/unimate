@extends('adminlte::page')

@section('title', 'View User Contact')

@section('content_header')
    <h1>User Contact Details</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User Contact Information</h3>
        </div>

        <div class="card-body">
            <div class="row">
                <!-- Displaying Student Profile Image -->
                <div class="col-md-12 text-center mb-4">
                    <h5 class="mb-3"><i class="fas fa-image"></i> Profile Image</h5>
                    @if ($contact->user && $contact->user->studentimage)
                        <img src="{{ route('student.image', ['filename' => basename($contact->user->studentimage)]) }}"
                             alt="Student Image" class="img-thumbnail rounded" width="200">
                    @else
                        <p>No image available</p>
                    @endif
                </div>

                <!-- Displaying User Contact Details -->
                <div class="col-md-6">
                    <strong>User ID:</strong> {{ $contact->user_id }}
                </div>
                <div class="col-md-6">
                    <strong>Student Name:</strong> {{ $contact->user ? $contact->user->name : 'N/A' }}
                </div>
                <div class="col-md-6">
                    <strong>Phone Number:</strong> {{ $contact->phone_number }} ({{ $contact->show_phone_number ? 'Visible' : 'Hidden' }})
                </div>
                <div class="col-md-6">
                    <strong>WhatsApp:</strong> {{ $contact->whatsapp }} ({{ $contact->show_whatsapp ? 'Visible' : 'Hidden' }})
                </div>
                <div class="col-md-6">
                    <strong>Telegram:</strong> {{ $contact->telegram }} ({{ $contact->show_telegram ? 'Visible' : 'Hidden' }})
                </div>
                <div class="col-md-6">
                    <strong>Facebook Profile:</strong> {{ $contact->facebook_profile }} ({{ $contact->show_facebook_profile ? 'Visible' : 'Hidden' }})
                </div>
                <div class="col-md-6">
                    <strong>Twitter Profile:</strong> {{ $contact->twitter_profile }} ({{ $contact->show_twitter_profile ? 'Visible' : 'Hidden' }})
                </div>
                <div class="col-md-6">
                    <strong>Instagram Profile:</strong> {{ $contact->instagram_profile }} ({{ $contact->show_instagram_profile ? 'Visible' : 'Hidden' }})
                </div>
            </div>

            <!-- Back Button -->
            <a href="{{ route('admin.usercontacts.index') }}" class="btn btn-secondary mt-4">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
        </div>
    </div>
@endsection
