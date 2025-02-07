@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="hero-section text-white py-5">
    <div class="container text-center">
        <!-- Reduced image size -->
        <img src="{{ asset('images/unimatelogo.png') }}" alt="UniMate Logo" class="img-fluid mb-4" style="max-width: 200px;">
        <h1 class="display-3 mb-3">Welcome to Unimate</h1>
        <p class="lead mb-4">Your one-stop platform for connecting with students, exploring college and experiencing campus life like never before!</p>
        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Join Us Today</a>
    </div>
</section>

<!-- Why Choose Unimate Section -->
<section class="why-choose-section py-5 bg-light">
    <div class="container text-center">
        <h2 class="display-4 mb-4">Why Choose Unimate?</h2>
        <div class="row">
            <!-- Explore Colleges Card -->
            <div class="col-md-4 mb-4">
                <div class="card p-4 shadow">
                    <h3 class="card-title">Explore Colleges</h3>
                    <p class="card-text">Get detailed insights about various colleges in UiTM Shah Alam and their registered students to make informed decisions about your future roommate.</p>
                </div>
            </div>
            <!-- Connect with Students Card -->
            <div class="col-md-4 mb-4">
                <div class="card p-4 shadow">
                    <h3 class="card-title">Connect with Students</h3>
                    <p class="card-text">Meet and connect with fellow students and build lasting friendships that go beyond the classroom.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card p-4 shadow">
                    <h3 class="card-title">Try Unimate</h3>
                    <p class="card-text">UniMate is your ideal roommate matching and campus community platform. We connect students, provide helpful information and foster lasting relationships to enhance your college experience.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonial Section with Different Background Color -->
<section class="testimonial-section py-5" style="background-color: #e0f7fa;"> <!-- Changed background color -->
    <div class="container text-center">
        <h2 class="display-4 mb-4">What Our Users Say</h2>
        <div class="row">
            <!-- Testimonial 1 -->
            <div class="col-md-4 mb-4">
                <div class="card p-4 shadow">
                    <p class="h5">"UniMate helped me connect with my ideal roommate and make the college experience much smoother!"</p>
                    <footer class="blockquote-footer mt-3">Wan Nur Liyana, Part 2 Student</footer>
                </div>
            </div>
            <!-- Testimonial 2 -->
            <div class="col-md-4 mb-4">
                <div class="card p-4 shadow">
                    <p class="h5">"I found my compatible roommate that helped me excel in my studies and adapt to campus life!"</p>
                    <footer class="blockquote-footer mt-3">Ilham Shah, College Freshman</footer>
                </div>
            </div>
            <!-- Testimonial 3 -->
            <div class="col-md-4 mb-4">
                <div class="card p-4 shadow">
                    <p class="h5">"The platform connections with other students really opened up new opportunities and friendships!"</p>
                    <footer class="blockquote-footer mt-3">Harleyna Abadi, Graduate Student</footer>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

<style>
    /* Importing Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&family=Lato:wght@400;500&display=swap');

    /* Apply Poppins font for headings */
    .hero-section, .why-choose-section h2, .testimonial-section h2 {
        font-family: 'Poppins', sans-serif;
    }

    /* Apply Lato font for text content */
    .card-text, .card-title, .blockquote-footer, .lead {
        font-family: 'Lato', sans-serif;
    }

    .hero-section {
        background-color: #6cc4ff; /* Light blue background */
        color: white;
        text-align: center;
    }

    .why-choose-section, .testimonial-section {
        background-color: #f8f9fa; /* Light grey background for 'Why Choose Unimate' */
    }

    /* Testimonial section custom background */
    .testimonial-section {
        background-color: #e0f7fa; /* Soft light cyan for testimonials */
    }

    .card {
        background-color: #ffffff;
        border-radius: 10px;
    }

    .card-title, .h5 {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .card-text, .blockquote-footer {
        font-size: 1rem;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-lg {
        font-size: 1.25rem;
        padding: 10px 20px;
    }
</style>
