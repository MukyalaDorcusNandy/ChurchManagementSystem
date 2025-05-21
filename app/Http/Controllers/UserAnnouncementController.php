<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Event;

class UserAnnouncementController extends Controller
{
    // Show all announcements and upcoming events to the user
    public function index()
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->get();

        // Fetch upcoming events (today and later)
        $upcomingEvents = Event::where('date', '>=', now())
                                ->orderBy('date', 'asc')
                                ->get();

        return view('Users.announcements.index', compact('announcements', 'upcomingEvents'));
    }
}
