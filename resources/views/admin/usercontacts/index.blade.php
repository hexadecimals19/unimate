@extends('adminlte::page')

@section('title', 'Manage User Contacts')

@section('content_header')
    <h1>User Contacts</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User Contacts List</h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Contact ID</th> <!-- New column for Contact ID -->
                        <th>User ID</th>
                        <th>Student Name</th> <!-- New column for Student Name -->
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
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $contact->id }}</td> <!-- Display Contact ID -->
                            <td>{{ $contact->user_id }}</td>
                            <td>{{ $contact->user ? $contact->user->name : 'N/A' }}</td> <!-- Display Student Name -->
                            <td>{{ $contact->phone_number }}</td>
                            <td>{{ $contact->whatsapp }}</td>
                            <td>{{ $contact->telegram }}</td>
                            <td>{{ $contact->facebook_profile }}</td>
                            <td>{{ $contact->twitter_profile }}</td>
                            <td>{{ $contact->instagram_profile }}</td>
                            <td>
                                <a href="{{ route('admin.usercontacts.show', $contact->id) }}" class="btn btn-info btn-sm">View</a>
                                <form action="{{ route('admin.usercontacts.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
