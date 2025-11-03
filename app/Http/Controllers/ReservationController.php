<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function create(Event $event)
    {
        return view('event.booking', compact('event'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
        ]);

        $event = Event::findOrFail($request->event_id);

        Reservation::create([
            'user_id' => Auth::id(),
            'event_id' => $event->id,
            'status' => 'confirmed',
        ]);

        return redirect()->route('events.show', $event)->with('success', 'Booking confirmed!');
    }
}
