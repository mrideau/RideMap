<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\SkateParc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SkateParcController extends Controller
{
    public function index()
    {
        $skateparcs = SkateParc::all();
//        print_r($skateparcs);
        return view('skate-parcs.index', compact('skateparcs'));
    }

    public function create() {
        return view('skate-parcs.edit');
    }

    public function show(SkateParc $skateparc)
    {
//        $skateparc = SkateParc::all()->where('slug', '=', $slug)->first();
        if ($skateparc) {
            return view('skate-parcs.show', compact('skateparc'));
        } else
            return redirect()->route('home');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'address' => ['nullable', 'string'],
            'city' => ['required', 'string'],
            'postcode' => ['required', 'numeric'],
            'coordinates' => ['required'],
            'email' => ['nullable', 'email'],
            'image' => ['nullable', 'image', 'mimes:png,jpg', 'max:2048']
        ]);

        $filename = uniqid() . '_' . trim($request->image->getClientOriginalName());
        $request->file('image')->storeAs('skate_parcs', $filename);

        $skateparc = new SkateParc();
        $skateparc->slug = Str::slug($request->title);
        $skateparc->type = 'skate-parc';
        $skateparc->title = $request->title;
        $skateparc->description = $request->description;
        $skateparc->address = $request->address;
        $skateparc->city = $request->city;
//        $skateparc->image_url = $filename;
        $skateparc->postcode = $request->postcode;
        $skateparc->coordinates = $request->coordinates;
        $skateparc->save();

//        Post::create(array_merge($request->all(), ['image_url' => $filename]));

        return redirect()->back()->with('Sucess');
    }

    public function edit(SkateParc $skateparc) {
//        $skateparc = SkateParc::all()->where('slug', '=', $slug)->first();
//        print_r($skateparc);
//        if ($skateparc) {
            return view('skate-parcs.edit', compact('skateparc'));
//        } else
//            return redirect()->route('');
    }

    public function update(Request $request, SkateParc $skateparc) {
        $skateparc->save();
    }

    public function destroy(SkateParc $skateparc) {
//        Storage::delete()
        $skateparc->delete();
        return redirect()->route('skate-parcs.index');
    }
}
