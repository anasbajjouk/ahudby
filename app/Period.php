<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $fillable = [
        'name', 'startDate', 'endDate', 'detail'
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

}
