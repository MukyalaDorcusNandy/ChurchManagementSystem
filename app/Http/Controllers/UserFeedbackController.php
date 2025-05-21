<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFeedbackController extends Controller
{
    // Show feedback form
    public function create()
    {
        return view('Users.feedback.create');
    }

    // Handle feedback form submission
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $user = Auth::user();

        // Save feedback - example: you can create a Feedback model and save to DB here
        // For now, let's pretend we save to a database table `feedbacks`
        \DB::table('feedbacks')->insert([
            'user_id' => $user->id,
            'message' => $request->message,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('user.feedback.create')->with('success', 'Thank you for your feedback!');
    }
}
