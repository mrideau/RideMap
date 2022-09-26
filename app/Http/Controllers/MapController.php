<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\SkatePark;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index() {
        $skateparks = SkatePark::all(['title', 'slug', 'city', 'coordinates', 'description'])->all();

        foreach ($skateparks as $skatepark) {
            $skatepark->image = $skatepark->getFirstMediaUrl('image');
        }

        return view('map', compact('skateparks'));
    }
}
