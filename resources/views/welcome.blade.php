@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-3xl font-bold mb-6">Upcoming Events</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($events as $event)
        <div class="bg-white shadow rounded overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h2 class="text-xl font-semibold">{{ $event->title }}</h2>
                <p class="text-gray-600">{{ $event->date->format('M d, Y') }} at {{ $event->time }}</p>
                <p class="text-gray-700 mt-2">{{ Str::limit($event->description, 80) }}</p>
                @if($event->averageRating() > 0)
                    <div class="flex items-center mt-2">
                        @for($i = 1; $i <= 5; $i++)
                            <svg class="w-4 h-4 {{ $i <= round($event->averageRating()) ? 'text-yellow-400 fill-current' : 'text-gray-300' }}" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        @endfor
                        <span class="ml-1 text-sm text-gray-600">{{ number_format($event->averageRating(), 1) }}</span>
                    </div>
                @endif
                <div class="mt-3 flex justify-between items-center">
                    <a href="{{ route('events.show', $event->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors">View Details</a>
                    @auth
                        <form action="{{ route('events.favorite', $event->id) }}" method="POST" class="inline">
                            @csrf
                            @method('POST')
                            <button type="submit" class="text-gray-400 hover:text-red-600 transition-colors">
                                <svg class="w-6 h-6 {{ auth()->user()->favorites()->where('event_id', $event->id)->exists() ? 'fill-current text-red-600' : 'stroke-current' }}" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
