<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    public function index()
    {
        return view('admin.content.index'); // Ensure this Blade file exists
    }
}
