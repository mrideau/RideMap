<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SponsorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sponsors = Sponsor::paginate(10);
        return view('sponsors.index', compact('sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sponsors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => ['required'],
           'website_url' => ['required'],
           'logo' => ['required']
        ]);

        $image_name = 'logo_' . Str::slug($request->name);
//dd($request);
        $sponsor = new Sponsor();
        $sponsor->fill($request->only(['name', 'website_url']));
        $sponsor->addMedia($request->file('logo'))->usingName($image_name)->toMediaCollection('logo'); // Stockage de l'image associée
        $sponsor->save();

        return redirect()->route('sponsors.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     */
    public function edit(Sponsor $sponsor)
    {
//        dd($sponsor);
        return view('sponsors.edit', compact('sponsor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sponsor  $sponsor
     */
    public function update(Request $request, Sponsor $sponsor)
    {
        $sponsor->fill($request);
//        $sponsor->deleteMedia();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sponsor  $sponsor
     */
    public function destroy(Sponsor $sponsor)
    {
        $sponsor->delete();
        // La suppression des medias automatique
        return redirect(route('sponsors.index'))->with('success');
    }
}
