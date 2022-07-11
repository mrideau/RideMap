<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\SkateParc;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index() {

        return view('map', [
            'events' => Event::all(['title', 'city', 'coordinates']),
            'skateparcs' => SkateParc::all(['title', 'city', 'coordinates'])
        ]);
    }
}
