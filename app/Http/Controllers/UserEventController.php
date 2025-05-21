<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class UserEventController extends Controller
{
    // Show the events dashboard for the user
    public function index(Request $request)
    {
        $userId = Auth::id();

        $search = $request->query('search');
        $ministry = $request->query('ministry');
        $date = $request->query('date');

        // Query upcoming events (date in future)
        $query = Event::where('date', '>=', now());

        if ($search) {
            $query->where('name', 'like', "%$search%");
        }
        if ($ministry) {
            $query->where('ministry', $ministry);
        }
        if ($date) {
            $query->whereDate('date', $date);
        }

        // Events upcoming and not registered by user
        $upcomingEvents = $query->whereDoesntHave('users', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })->get();

        // Events user has registered for and still upcoming
        $registeredEvents = Event::whereHas('users', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })->where('date', '>=', now())->get();

        // Past events user attended
        $pastEvents = Event::whereHas('users', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })->where('date', '<', now())->get();

        return view('Users.events.index', compact('upcomingEvents', 'registeredEvents', 'pastEvents'));
    }

    // Show single event details (optional, for user.events.show route)
    public function show(Event $event)
    {
        return view('Users.events.show', compact('event'));
    }

    // User requests to join (RSVP) an event
    public function join(Event $event)
    {
        $userId = Auth::id();

        // Attach user to event with default status "pending"
        $event->users()->syncWithoutDetaching([
            $userId => ['status' => 'pending']
        ]);

        return redirect()->route('Users.events.index')->with('success', 'You have requested to join the event.');
    }

    // User cancels their registration
    public function cancel(Event $event)
    {
        $userId = Auth::id();

        $event->users()->detach($userId);

        return redirect()->route('Users.events.index')->with('success', 'Your registration has been cancelled.');
    }
}
