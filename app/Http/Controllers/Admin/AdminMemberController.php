<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminMemberController extends Controller
{
    // List all registered members
    public function index()
    {
        $members = User::where('role', '!=', 'admin')->get(); // or filter based on actual criteria
        return view('admin.members.index', compact('members'));
    }

    // Update member status or role
    public function update(Request $request, User $member)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
            'role' => 'nullable|string|max:255',
        ]);

        $member->update([
            'status' => $request->status,
            'role' => $request->role,
        ]);

        return redirect()->back()->with('success', 'Member updated successfully.');
    }

    // Remove a member
    public function destroy(User $member)
    {
        $member->delete();
        return redirect()->back()->with('success', 'Member removed successfully.');
    }
}
