<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $primaryKey = 'slug';
//    protected $perPage = 15;
    protected $fillable = [
        'title',
        'description',
        'address',
        'city',
        'postcode',
//        'coordinates'
    ];

    protected $guarded = [];

    protected $casts = [
        'date' => 'date'
    ];

    protected $table = 'posts';

    public function getRouteKeyName()
    {
        return 'slug';
    }

//    public function getKeyName()
//    {
//        return 'slug';
//    }
}
