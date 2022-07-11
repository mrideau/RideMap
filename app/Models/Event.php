<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Post
{
    use HasFactory;

    protected $table = 'posts';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('type', 'event');
        });
    }
}
