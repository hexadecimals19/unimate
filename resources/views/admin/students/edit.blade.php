@extends('adminlte::page')

@section('title', 'Edit Student')

@section('content_header')
    <h1>Edit Student Details</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit {{ $user->name }}'s Details</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.students.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Form fields here -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="studentemail">Email</label>
                    <input type="email" name="studentemail" id="studentemail" class="form-control" value="{{ $user->studentemail }}" required>
                </div>

<!-- College -->
<div class="form-group">
    <label for="studentcollege">Student College:</label>
    <select name="studentcollege" id="studentcollege" class="form-control" required>
        @foreach($colleges as $college)
            <option value="{{ $college->collegename }}" {{ old('studentcollege', $user->studentcollege) == $college->collegename ? 'selected' : '' }}>
                {{ $college->collegename }}
            </option>
        @endforeach
    </select>
</div>


                <!-- Student ID -->
                <div class="form-group">
                    <label for="studentid">Student ID</label>
                    <input type="text" name="studentid" id="studentid" class="form-control" value="{{ $user->studentid }}">
                </div>

                <!-- Gender -->
                <div class="form-group">
                    <label for="studentgender">Gender</label>
                    <select name="studentgender" id="studentgender" class="form-control">
                        <option value="male" {{ $user->studentgender == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $user->studentgender == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success">Update Student</button>
                <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
