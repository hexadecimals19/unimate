@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-5">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Logo in the center -->
                    <div class="text-center mb-4">
                        <img src="{{ asset('images/unimatelogo.png') }}" alt="Unimate Logo" class="img-fluid" style="max-width: 150px;">
                    </div>

                    <!-- Search Form -->
                    <form method="GET" action="{{ route('home') }}" class="mt-4">
                        <div class="input-group mb-4">
                            <input type="text" name="search" class="form-control form-control-lg" placeholder="Search for colleges..." value="{{ request('search') }}">
                            <button class="btn btn-primary btn-lg px-4" type="submit">
                                <i class="bi bi-search"></i> Search
                            </button>
                        </div>
                    </form>

                    <!-- College Cards -->
                    <div class="row g-4 mt-5">
                        @if ($colleges->isEmpty())
                            <div class="col-12 text-center">
                                <p class="text-muted">No colleges found. Please try a different search or check back later.</p>
                            </div>
                        @else
                            @foreach ($colleges as $college)
                                <div class="col-lg-4 col-md-6">
                                    <a href="{{ route('colleges.show', $college->id) }}" class="text-decoration-none text-dark">
                                        <div class="card border-0 shadow-sm h-100 rounded-4">
                                            <img src="{{ asset($college->collegeimage) }}" alt="{{ $college->collegename }}" class="card-img-top rounded-top-4" style="height: 150px; object-fit: cover;">
                                            <div class="card-body p-4 text-center d-flex flex-column">
                                                <h5 class="card-title fw-bold mb-3">{{ $college->collegename }}</h5>
                                                <p class="card-text text-muted">{{ Str::limit($college->collegedesc, 80) }}</p>
                                                <div class="mt-auto">
                                                    <a href="{{ route('colleges.show', $college->id) }}" class="btn btn-outline-primary mt-3 px-4">Learn More</a>
                                                </div>
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
