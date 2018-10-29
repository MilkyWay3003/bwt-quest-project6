<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    protected $fillable = [
        'name', 'description', 'services', 'image', 'hotel_id', 'checkin', 'checkout',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\Hotel');
    }

    public function prices()
    {
        return $this->hasMany('App\Models\Price');
    }
}
