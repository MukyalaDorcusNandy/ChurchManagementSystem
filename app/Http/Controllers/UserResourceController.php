<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserResourceController extends Controller
{
    // Show the list of resources for users/members
    public function index()
    {
        // For now, static sample resources could be passed here if needed.
        // You can replace this with DB data if you have a Resource model/table.
        return view('Users.resources.index');
    }
}
