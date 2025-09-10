@extends('layouts.app')

@section('content')
    <h1 class="mb-10 text-2xl">Add Review for {{ $book->title }}</h1>

    <form method="POST" action="{{ route('books.reviews.store', $book) }}">
        @csrf
        <div class="mb-4">
            <label for="review">Review</label>
            <textarea name="review" id="review"  class="input">{{ old('review') }}</textarea>
            @error('review')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="rating">Rating</label>

            <select name="rating" id="rating" class="input" >
                <option value="">Select a Rating</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
            @error('rating')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn">Add Review</button>
    </form>
@endsection
