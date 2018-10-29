<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name', 'country', 'city', 'postcode', 'address', 'description', 'rating', 'image',
    ];

    public function rooms()
    {
        return $this->hasMany('App\Models\Room');
    }
}

