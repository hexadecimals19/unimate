@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-lg border-0 rounded-4 my-5">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <h1 class="fw-bold text-primary">Write a Review for {{ $roommate->name }}</h1>
                </div>
                <form action="{{ route('reviews.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="roommate_id" value="{{ $roommate->id }}">

                    <!-- Rating Field -->
                    <div class="mb-4">
                        <label for="rating" class="form-label fw-bold">Rating</label>
                        <div class="rating d-flex gap-2">
                            @for($i = 1; $i <= 5; $i++)
                                <input type="radio" class="btn-check" name="rating" id="rating{{ $i }}" value="{{ $i }}" required>
                                <label class="btn btn-outline-warning" for="rating{{ $i }}">
                                    <i class="fas fa-star"></i> {{ $i }}
                                </label>
                            @endfor
                        </div>
                    </div>

                    <!-- Review Text Area -->
                    <div class="mb-4">
                        <label for="review" class="form-label fw-bold">Review</label>
                        <textarea name="review" id="review" class="form-control rounded-4 shadow-sm" rows="4" required></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm px-5">
                            <i class="fas fa-paper-plane"></i> Submit Review
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow for modern look */
        }

        .btn-outline-warning {
            transition: all 0.3s ease-in-out;
        }

        .btn-outline-warning:hover, .btn-check:checked + .btn-outline-warning {
            background-color: #ffc107; /* Bootstrap yellow for selected */
            color: #fff; /* White text for better visibility */
        }

        .form-control {
            transition: box-shadow 0.3s ease; /* Smooth transition for form field shadow */
        }

        .form-control:focus {
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.25); /* Highlight shadow effect */
        }

        .btn-primary {
            transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition for buttons */
        }

        .btn-primary:hover {
            background-color: #0056b3;
            color: #ffffff;
        }
    </style>
@endsection

@section('js')
    <script>
        console.log('Write a Review Page Loaded');
    </script>
@endsection
