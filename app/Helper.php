<?php

namespace App;

use App\Author;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Helper extends Eloquent
{
    public static function scopeSearchByName($query, $name)
    {
        return $query->where('name', $name);
    }

}
