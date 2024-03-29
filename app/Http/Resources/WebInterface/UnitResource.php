<?php

namespace App\Http\Resources\WebInterface;

use Illuminate\Http\Resources\Json\JsonResource;

class UnitResource extends JsonResource
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
            'id' => $this -> id,
            'NameUnit' => $this -> NameUnit,
            'Description' => $this -> Description,
            'plant_id' => $this -> plant_id,
            'routWEB' => $this -> routWEB,
            'routAPI' => $this -> routAPI,
        ];
    }
}
