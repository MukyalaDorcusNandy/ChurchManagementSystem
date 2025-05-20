<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    // Show the admin dashboard
    public function dashboard()
    {
        $totalMembers = User::where('role', '!=', 'admin')->count();
        $pendingMembers = User::where('status', 'pending')->count();
        $approvedMembers = User::where('status', 'approved')->count();
        $rejectedMembers = User::where('status', 'rejected')->count();

        return view('admin.dashboard', compact(
            'totalMembers',
            'pendingMembers',
            'approvedMembers',
            'rejectedMembers'
        ));
    }

    // Show admin notifications page
    public function notifications()
    {
        // For now, just return a placeholder view
        return view('admin.notifications');
    }
}
