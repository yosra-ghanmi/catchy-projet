@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <div class="bg-white shadow rounded p-6">
        <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-64 object-cover mb-4">
        <h1 class="text-3xl font-bold">{{ $event->title }}</h1>
        <p class="text-gray-600">{{ $event->date->format('M d, Y') }} at {{ $event->time }}</p>
        <p class="text-gray-700 mt-4">{{ $event->description }}</p>
        <p class="mt-2 font-semibold">Location: {{ $event->location }}</p>
        <p class="mt-1 font-semibold">Price: {{ $event->price ? '$' . $event->price : 'Free' }}</p>
        <div class="mt-4 flex items-center space-x-4">
            <a href="{{ route('events.book', $event->id) }}" class="bg-primary-600 text-white px-4 py-2 rounded hover:bg-primary-700 transition-colors">Book Now</a>
            @auth
                <form action="{{ route('events.favorite', $event->id) }}" method="POST" class="inline">
                    @csrf
                    @method('POST')
                    <button type="submit" class="flex items-center space-x-2 text-gray-600 hover:text-accent-600 transition-colors">
                        <svg class="w-6 h-6 {{ $isFavorited ? 'fill-current text-accent-600' : 'stroke-current' }}" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                        <span>{{ $isFavorited ? 'Remove from Favorites' : 'Add to Favorites' }}</span>
                    </button>
                </form>
            @endauth
        </div>

        <!-- Reviews Section -->
        <div class="mt-8">
            <h2 class="text-2xl font-bold mb-4">Reviews</h2>
            @if($reviews->count() > 0)
                <div class="mb-4">
                    <p class="text-lg">Average Rating: {{ number_format($event->averageRating(), 1) }} / 5</p>
                    <div class="flex items-center">
                        @for($i = 1; $i <= 5; $i++)
                            <svg class="w-5 h-5 {{ $i <= round($event->averageRating()) ? 'text-yellow-400 fill-current' : 'text-gray-300' }}" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        @endfor
                        <span class="ml-2 text-gray-600">({{ $reviews->count() }} reviews)</span>
                    </div>
                </div>
                <div class="space-y-4">
                    @foreach($reviews as $review)
                        <div class="border border-gray-200 rounded p-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <span class="font-semibold">{{ $review->user->name }}</span>
                                    <div class="ml-4 flex">
                                        @for($i = 1; $i <= 5; $i++)
                                            <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400 fill-current' : 'text-gray-300' }}" viewBox="0 0 24 24">
                                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                            </svg>
                                        @endfor
                                    </div>
                                </div>
                                <span class="text-sm text-gray-500">{{ $review->created_at->format('M d, Y') }}</span>
                            </div>
                            @if($review->comment)
                                <p class="mt-2 text-gray-700">{{ $review->comment }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600">No reviews yet. Be the first to review this event!</p>
            @endif

            @auth
                <div class="mt-6">
                    <h3 class="text-lg font-semibold mb-2">{{ $userReview ? 'Update Your Review' : 'Leave a Review' }}</h3>
                    <form action="{{ route('events.reviews.store', $event) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Rating</label>
                            <select name="rating" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                <option value="">Select rating</option>
                                @for($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ $userReview && $userReview->rating == $i ? 'selected' : '' }}>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Comment (optional)</label>
                            <textarea name="comment" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ $userReview ? $userReview->comment : '' }}</textarea>
                        </div>
                        <button type="submit" class="bg-primary-600 text-white px-4 py-2 rounded hover:bg-primary-700 transition-colors">{{ $userReview ? 'Update Review' : 'Submit Review' }}</button>
                    </form>
                </div>
            @endauth
        </div>
    </div>
</div>
@endsection
