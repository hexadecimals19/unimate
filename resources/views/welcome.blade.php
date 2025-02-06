@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="hero-section text-black py-5">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="hero-text">
            <h1 class="display-4 mb-3">Welcome to Unimate</h1>
            <p class="h3 mb-4">Your one-stop platform for connecting with students, exploring colleges, and experiencing campus life like never before!</p>
            <a href="{{ route('register') }}" class="btn btn-light btn-lg mr-3">Get Started</a>
        </div>
        <div class="hero-image">
            <img src="{{ asset('images/unimatelogo.png') }}" alt="Business Illustration" class="img-fluid">
        </div>
    </div>
</section>


<!-- Call to Action Section -->
<section class="cta-section softer-blue-bg text-white py-5">
    <div class="container text-center">
        <h2 class="cta-title display-4 mb-3">Be Part of the Unimate Community</h2>
        <p class="cta-subtitle h4 mb-4">Unlock your potential, meet new people, and embrace new opportunities.</p>
        <a href="{{ route('login') }}" class="btn btn-light btn-lg">Login Now</a>
    </div>
</section>


@endsection
<style>
    .softer-blue-bg {
        background-color: #6cc4ff; /* Softer light blue */
    }
</style>
