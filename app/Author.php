<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'name', 'bd', 'deathdate', 'bio', 'externalLink'
    ];

    public function compositions(){
        return $this->belongsToMany(Composition::class);
    }

    public function videos(){
        return $this->belongsToMany(Video::class);
    }

    public function photos(){
        return $this->hasMany(Photo::class);
    }

}
