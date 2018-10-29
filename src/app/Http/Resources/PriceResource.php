<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PriceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'cost' => $this->cost,
            'currency' => $this->currency,
            'max_persons' => $this->max_persons,
            'cancel_type' => $this->cancel_type,
            'meal' => $this->meal,
            'room_id' => $this->room_id,
        ];
    }
}

