<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class SkatePark extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'skateparks';

    // Enlève l'incrementation (pour l'utilisation du slug comme id)
    public $incrementing = false;

    // Utilise la colonne "slug" comme clé primaire
    protected $primaryKey = 'slug';
//    protected $perPage = 15;

    // Protection contre le "mass assign"
    protected $fillable = [
        'title',
        'description',
        'address',
        'city',
        'postcode',
//        'coordinates'
    ];

    // Permet d'appliquer un format date à la date
    protected $casts = [
        'date' => 'date'
    ];

    // Permet d'utiliser le slug plutôt que l'id
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

//    public function getKeyName()
//    {
//        return 'slug';
//    }

    // Déclaration des collections pour le stockage des medias associés
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile();
        $this->addMediaCollection('gallery');
    }
}
