@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Students Registered at {{ $college->collegename }}</h2>

    @if($students->isEmpty())
        <p class="text-center mt-4">No students have registered at this college yet.</p>
    @else
        <div class="row">
            @foreach($students as $student)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            @if ($student->studentimage)
                                <div class="mb-4">
                                    <img src="{{ route('student.image', ['filename' => basename($student->studentimage)]) }}" alt="Student Image" class="img-thumbnail rounded-circle" width="100">
                                </div>
                            @endif
                            <h5 class="card-title">
                                <a href="{{ route('user.show', $student->id) }}">{{ $student->name }}</a>
                            </h5>
                            <p class="card-text">Student ID: {{ $student->studentid }}</p>
                            <p class="card-text">Email: {{ $student->studentemail }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
