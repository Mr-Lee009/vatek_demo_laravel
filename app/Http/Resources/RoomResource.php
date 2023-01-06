<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->UUID,
            'hotelId' => $this->HOTEL_ID,
            'nameRoom' => $this->NAME_ROOM,
            'typeRoom' => $this->TYPE_ROOM,
            'desciption' => $this->DESCIPTION,
            'createDate' => $this->CREATE_DATE
        ];
    }
}
