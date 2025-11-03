<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventController::class, 'index'])->name('home');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/events/{event}/book', [ReservationController::class, 'create'])->name('events.book');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::post('/events/{event}/favorite', [EventController::class, 'toggleFavorite'])->name('events.favorite');
    Route::post('/events/{event}/reviews', [EventController::class, 'storeReview'])->name('events.reviews.store');
    Route::get('/favorites', function () {
        $favorites = auth()->user()->favorites()->with('event')->get();
        return view('favorites', compact('favorites'));
    })->name('favorites');
    Route::get('/dashboard', function () {
        $reservations = auth()->user()->reservations()->with('event')->get();
        return view('dashboard', compact('reservations'));
    })->name('dashboard');
});

require __DIR__.'/auth.php';
