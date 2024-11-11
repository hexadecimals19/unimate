@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Logo in the center -->
                    <div class="mt-4 text-center">
                        <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" class="img-fluid" style="max-width: 150px;">
                    </div>

                    <!-- Search Form -->
                    <form method="GET" action="{{ route('home') }}" class="mt-4">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Search for colleges..." value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>

                    <!-- College Cards -->
                    <div class="row mt-4">
                        @if ($colleges->isEmpty())
                            <div class="col-12 text-center">
                                <p class="text-muted">No colleges found. Please try a different search or check back later.</p>
                            </div>
                        @else
                            @foreach ($colleges as $college)
                                <div class="col-md-4 mb-4">
                                    <a href="{{ route('colleges.show', $college->id) }}" class="text-decoration-none text-dark">
                                        <div class="card h-100">
                                            <img src="{{ asset($college->collegeimage) }}" alt="{{ $college->collegename }}" class="card-img-top" style="width: px; height: 110px; object-fit: cover;">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">{{ $college->collegename }}</h5>
                                                <p class="card-text">{{ $college->collegedesc }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
