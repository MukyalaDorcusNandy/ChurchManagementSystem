<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.index'); // Ensure this view exists
    }
}
