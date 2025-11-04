@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-red-50 to-white">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-primary-500 to-primary-600 text-white py-16">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-5xl font-bold mb-4">Discover Tunisia's Best</h1>
            <p class="text-xl mb-8 opacity-90">Find amazing restaurants, events, and sports venues around you</p>

            <!-- Location Search -->
            <div class="max-w-md mx-auto bg-white rounded-full shadow-lg p-2">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400 ml-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                    </svg>
                    <input type="text" placeholder="Enter your location in Tunisia..." class="flex-1 px-4 py-2 bg-transparent text-gray-700 placeholder-gray-400 focus:outline-none">
                    <button class="bg-primary-500 hover:bg-primary-600 text-white px-6 py-2 rounded-full transition-colors">
                        Search
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories Section -->
    <div class="container mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">Explore Categories</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <!-- Restaurants -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                <div class="bg-gradient-to-r from-primary-400 to-primary-500 p-6 text-white">
                    <h3 class="text-2xl font-bold mb-2">Restaurants</h3>
                    <p class="opacity-90">Discover the finest dining experiences in Tunisia</p>
                </div>
                <div class="p-6">
                    <a href="#" class="inline-block bg-primary-500 hover:bg-primary-600 text-white px-6 py-3 rounded-full
   transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg font-semibold">
                        Explore Restaurants
                    </a>
                </div>
            </div>

            <!-- Events -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                <div class="bg-gradient-to-r from-primary-400 to-primary-500 p-6 text-white">
                    <h3 class="text-2xl font-bold mb-2">Events</h3>
                    <p class="opacity-90">Find exciting events and cultural experiences</p>
                </div>
                <div class="p-6">
                    <a href="#" class="inline-block bg-primary-500 hover:bg-primary-600 text-white px-6 py-3 rounded-full
   transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg font-semibold">
                        Explore Events
                    </a>
                </div>
            </div>

            <!-- Sports -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                <div class="bg-gradient-to-r from-primary-400 to-primary-500 p-6 text-white">
                    <h3 class="text-2xl font-bold mb-2">Sports</h3>
                    <p class="opacity-90">Book sports venues and activities</p>
                </div>
                <div class="p-6">
                    <a href="#" class="inline-block bg-primary-500 hover:bg-primary-600 text-white px-6 py-3 rounded-full
   transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg font-semibold">
                        Explore Sports
                    </a>
                </div>
            </div>
        </div>

        <!-- Featured Places Feed -->
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">Featured Places Near You</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($events as $event)
            <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden transform hover:-translate-y-1">
                <div class="relative">
                    <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover">
                    @if($event->featured)
                        <div class="absolute top-4 right-4 bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Featured
                        </div>
                    @endif
                </div>
                <div class="p-6">
                    <div class="flex items-center mb-2">
                        <svg class="w-5 h-5 text-orange-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm text-gray-600">Tunis, Tunisia</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $event->title }}</h3>
                    <p class="text-gray-600 mb-3">{{ Str::limit($event->description, 100) }}</p>

                    @if($event->averageRating() > 0)
                        <div class="flex items-center mb-3">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4 {{ $i <= round($event->averageRating()) ? 'text-orange-400 fill-current' : 'text-gray-300' }}" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            @endfor
                            <span class="ml-2 text-sm text-gray-600">{{ number_format($event->averageRating(), 1) }}</span>
                        </div>
                    @endif

                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-500">
                            <span>{{ $event->date->format('M d, Y') }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ $event->time }}</span>
                        </div>
                        @auth
                            <form action="{{ route('events.favorite', $event->id) }}" method="POST" class="inline">
                                @csrf
                                @method('POST')
                                <button type="submit" class="text-gray-400 hover:text-accent-600 transition-colors p-2 rounded-full hover:bg-accent-50">
                                    <svg class="w-6 h-6 {{ auth()->user()->favorites()->where('event_id', $event->id)->exists() ? 'fill-current text-accent-600' : 'stroke-current' }}" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                </button>
                            </form>
                        @endauth
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('events.show', $event->id) }}" class="inline-block w-full bg-accent-500 hover:bg-accent-600 text-white text-center py-3 px-6 rounded-lg transition-colors font-semibold">
                            View Details & Book
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
