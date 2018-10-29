<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'country' => $this->country,
            'city' => $this->city,
            'postcode' => $this->postcode,
            'address'=> $this->address,
            'description'=> $this->description,
            'rating'=> $this->rating,
            'image'=> $this->image,
            'rooms' => RoomResource::collection($this->rooms),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
