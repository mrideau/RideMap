<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home', [
            'events' => Event::all(['title', 'city'])->take(3)
        ]);
    }
}
