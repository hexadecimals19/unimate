@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body text-center">
            <h2>{{ $college->collegename }}</h2>
            <img src="{{ asset($college->collegeimage) }}" alt="{{ $college->collegename }}" class="img-fluid mb-3" style="max-width: 300px;">
            <p>{{ $college->collegedesc }}</p>

            <!-- Button to show students registered in the college -->
            <a href="{{ route('colleges.students', $college->id) }}" class="btn btn-primary mt-3">View Registered Students</a>
        </div>
    </div>
</div>
@endsection
