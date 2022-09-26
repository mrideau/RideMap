<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $sponsors = Sponsor::all();
        return view('home', compact('sponsors'));
    }
}
