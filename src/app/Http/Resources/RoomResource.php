<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'services' => $this->services,
            'image' => $this->image,
            'hotel_id' => $this->hotel_id,
            'checkin'=> $this->checkin,
            'checkout'=> $this->checkout,
            'prices' => PriceResource::collection($this->prices),
        ];
    }
}
