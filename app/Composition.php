<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Composition extends Model
{
    protected $fillable = [
        'description', 'name', 'date', 'soundTrack'
    ];


    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

}
