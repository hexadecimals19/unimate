@extends('adminlte::page')

@section('title', 'Edit College')

@section('content_header')
    <h1>Edit College</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.colleges.update', $college->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="collegename">College Name</label>
                    <input type="text" name="collegename" id="collegename" class="form-control" value="{{ $college->collegename }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="collegeimage">College Image</label>
                    <input type="file" name="collegeimage" id="collegeimage" class="form-control">

                    <!-- Display existing college image if available -->
                    @if ($college->collegeimage)
                        <div class="mt-3">
                            <label>Current Image:</label>
                            <img src="{{ asset($college->collegeimage) }}" alt="{{ $college->collegename }}" class="img-fluid mt-2" style="max-width: 150px; border: 1px solid #ccc; padding: 5px;">
                        </div>
                    @endif
                </div>


                <div class="form-group mb-3">
                    <label for="collegedesc">College Description</label>
                    <textarea name="collegedesc" id="collegedesc" rows="4" class="form-control" required>{{ $college->collegedesc }}</textarea>
                </div>

<!-- College Type -->
<div class="form-group mb-3">
    <label for="collegetype">College Type</label>
    <select name="collegetype" id="collegetype" class="form-control" required>
        <option value="">Select College Type</option>
        <option value="1" {{ old('collegetype', $college->collegetype) == '1' ? 'selected' : '' }}>Male College</option>
        <option value="2" {{ old('collegetype', $college->collegetype) == '2' ? 'selected' : '' }}>Female College</option>
    </select>
</div>


                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
@endsection
