<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Index route
    public function index()
    {
        return view('notifications');
    }
}
