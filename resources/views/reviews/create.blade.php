@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Write a Review for {{ $roommate->name }}</h1>
        <form action="{{ route('reviews.store') }}" method="POST">
            @csrf
            <input type="hidden" name="roommate_id" value="{{ $roommate->id }}">
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <select name="rating" id="rating" class="form-control" required>
                    <option value="1">1 Star</option>
                    <option value="2">2 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="5">5 Stars</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="review" class="form-label">Review</label>
                <textarea name="review" id="review" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Review</button>
        </form>
    </div>
@endsection
