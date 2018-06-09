<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'name', 'path'
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
}
