<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = [
        'cost', 'currency', 'max_persons', 'cancel_type', 'meal', 'room_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\Room');
    }
}
