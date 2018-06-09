<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'name', 'description', 'path', 'startDate', 'endDate', 'author_id', 'period_id', 'user_id'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
