<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    // Show event feed
    public function index()
    {
        // Fetch all events ordered by date
        $events = Event::orderBy('date')->get();

        // Pass events to the welcome.blade.php view
        return view('welcome', compact('events'));
    }

    // Show single event details
    public function show(Event $event)
    {
        $isFavorited = auth()->check() ? auth()->user()->favorites()->where('event_id', $event->id)->exists() : false;
        $reviews = $event->reviews()->with('user')->get();
        $userReview = auth()->check() ? $event->reviews()->where('user_id', auth()->id())->first() : null;
        return view('event.show', compact('event', 'isFavorited', 'reviews', 'userReview'));
    }

    // Toggle favorite for an event
    public function toggleFavorite(Event $event)
    {
        if (!auth()->check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $favorite = auth()->user()->favorites()->where('event_id', $event->id)->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['favorited' => false, 'message' => 'Removed from favorites']);
        } else {
            auth()->user()->favorites()->create(['event_id' => $event->id]);
            return response()->json(['favorited' => true, 'message' => 'Added to favorites']);
        }
    }

    // Store a review for an event
    public function storeReview(Request $request, Event $event)
    {
        if (!auth()->check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $review = $event->reviews()->updateOrCreate(
            ['user_id' => auth()->id()],
            ['rating' => $request->rating, 'comment' => $request->comment]
        );

        return response()->json(['success' => true, 'message' => 'Review submitted successfully']);
    }}
