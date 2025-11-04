@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <div class="bg-white shadow rounded p-6 max-w-md mx-auto">
        <h1 class="text-2xl font-bold mb-4">Book: {{ $event->title }}</h1>

        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <input type="hidden" name="event_id" value="{{ $event->id }}">

            <div class="mb-4">
                <label class="block mb-1">Your Name</label>
                <input type="text" name="name" value="{{ auth()->user()->name }}" class="w-full border rounded px-3 py-2" readonly>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Your Email</label>
                <input type="email" name="email" value="{{ auth()->user()->email }}" class="w-full border rounded px-3 py-2" readonly>
            </div>

            <button type="submit" class="bg-primary-600 text-white px-4 py-2 rounded hover:bg-primary-700 transition-colors">Confirm Booking</button>
        </form>
    </div>
</div>
@endsection
