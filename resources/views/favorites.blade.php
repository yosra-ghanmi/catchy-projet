<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Favorites') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Your Favorite Events</h3>

                    @if($favorites->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @foreach($favorites as $favorite)
                                <div class="bg-white shadow rounded overflow-hidden">
                                    <img src="{{ asset('storage/' . $favorite->event->image) }}" alt="{{ $favorite->event->title }}" class="w-full h-48 object-cover">
                                    <div class="p-4">
                                        <h4 class="text-xl font-semibold">{{ $favorite->event->title }}</h4>
                                        <p class="text-gray-600">{{ $favorite->event->date->format('M d, Y') }} at {{ $favorite->event->time }}</p>
                                        <p class="text-gray-700 mt-2">{{ Str::limit($favorite->event->description, 80) }}</p>
                                        <div class="mt-3 flex justify-between items-center">
                                            <a href="{{ route('events.show', $favorite->event->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded">View Details</a>
                                            <form action="{{ route('events.favorite', $favorite->event->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" class="text-red-600 hover:text-red-800">
                                                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <p class="text-gray-500 dark:text-gray-400 mb-4">You haven't favorited any events yet.</p>
                            <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Browse Events
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
