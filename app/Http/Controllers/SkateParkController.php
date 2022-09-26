<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkateparkRequest;
use App\Models\SkatePark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SkateParkController extends Controller
{
    public function index()
    {
        $skateparks = SkatePark::query();
        $req = request('skatepark');

        if ($req) {
            $skateparks->where('title', 'Like', '%' . $req . '%');
        }

        $skateparks = $skateparks->orderBy('title', 'ASC')->paginate();
        return view('skateparks.index', compact('skateparks', 'req'));
    }

    public function create() {
        return view('skateparks.edit');
    }

    public function show(SkatePark $skatepark)
    {
        return view('skateparks.show', compact('skatepark'));
    }

    public function store(SkateparkRequest $request)
    {
//        $request->validate([
//            'title' => ['required', 'string'],
//            'description' => ['required', 'string'],
//            'address' => ['nullable', 'string'],
//            'city' => ['required', 'string'],
//            'postcode' => ['required', 'numeric'],
//            'coordinates' => ['required'],
//            'email' => ['nullable', 'email'],
//            'image' => ['nullable', 'image', 'mimes:png,jpg', 'max:2048'],
//            'gallery' => ['nullable'],
//            'gallery.*' => ['image', 'mimes:png,jpg', 'max:2048'],
//        ]);

//        $filename = uniqid() . '_' . trim($request->image->getClientOriginalName());
//        $request->file('image')->storeAs('skate_parcs', $filename);

        // New model instance
        $skatepark = new SkatePark();

        $this->saveSkatepark($request, $skatepark);

        return redirect()->route('skateparks.index')->with('success', 'Skatepark enregistré avec succès.');
    }

    public function edit(SkatePark $skatepark) {
//        $image_url = $skatepark->getFirstMediaUrl('image');
        return view('skateparks.edit', compact('skatepark'));
    }

    public function update(SkateparkRequest $request, SkatePark $skatepark) {
        $this->saveSkatepark($request, $skatepark);

        return redirect()->route('skateparks.index')->with('success', 'Skatepark modifié avec succès.');
    }

    public function destroy(SkatePark $skatepark) {
        // Supprime le modèle de la base de données
        // Les medias associés sont automatiquement supprimés
        $skatepark->delete();
        return redirect()->route('skateparks.index')->with('success', 'Skatepark supprimé avec succès.');
    }

    // Fonction pour sauvegarder (créer/éditer) un skatepark
    function saveSkatepark(SkateparkRequest $request, SkatePark $skatepark) {
        if ($request->hasFile('image')) {
            $filename = trim($request->image->getClientOriginalName());
            $skatepark->addMedia($request->file('image'))->usingName($filename)->toMediaCollection('image');
        }

        if($request->hasFile('gallery'))
            foreach($request->file('gallery') as $image) {
                $name = $image->getClientOriginalName();
                $skatepark->addMedia($image)->usingName($name)->toMediaCollection('gallery');
            }
//        $skatepark->deleteMedia();

        if (isset($request->galleryDelete[0])) {
            foreach (explode(',', $request->galleryDelete[0]) as $image_id) {
                $skatepark->deleteMedia($image_id);
            }
        }

        $slug = Str::slug($request->title);

        // Associer le nouveau slug aux medias pour conserver le lien au modèle
        if ($skatepark->slug !== $slug) {
            $medias = Media::all()->where('model_id', '=', $skatepark->slug);

            foreach ($medias as $media) {
                $media->model_id = $slug;
                $media->save();
            }
        }

        $skatepark->slug = $slug;
        $skatepark->title = $request->title;
        $skatepark->description = $request->description;
        $skatepark->address = $request->address;
        $skatepark->city = $request->city;
        $skatepark->postcode = $request->postcode;
        $skatepark->coordinates = $request->coordinates;

        // Sauvegarde dans la base de données
        $skatepark->save();
    }
}
