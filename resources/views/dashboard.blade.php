<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Bookings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Your Event Reservations</h3>

                    @if($reservations->count() > 0)
                        <div class="space-y-4">
                            @foreach($reservations as $reservation)
                                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h4 class="font-semibold text-gray-900 dark:text-gray-100">{{ $reservation->event->title }}</h4>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $reservation->event->location }}</p>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                                {{ \Carbon\Carbon::parse($reservation->event->date)->format('M j, Y') }} at {{ \Carbon\Carbon::parse($reservation->event->time)->format('g:i A') }}
                                            </p>
                                        </div>
                                        <div class="text-right">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                @if($reservation->status === 'confirmed')
                                                    bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                                @elseif($reservation->status === 'pending')
                                                    bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                                                @else
                                                    bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200
                                                @endif">
                                                {{ ucfirst($reservation->status) }}
                                            </span>
                                            <p class="text-sm font-medium text-gray-900 dark:text-gray-100 mt-1">${{ number_format($reservation->event->price, 2) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <p class="text-gray-500 dark:text-gray-400 mb-4">You haven't booked any events yet.</p>
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
