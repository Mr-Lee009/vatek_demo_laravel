<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->UUID,
            'nameHotel' => $this->NAME_HOTEL,
            'description' => $this->DESCRIPTION,
            'createDate' => $this->CREATE_DATE
        ];
    }
}
