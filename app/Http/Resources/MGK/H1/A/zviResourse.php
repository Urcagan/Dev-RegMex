<?php

namespace App\Http\Resources\MGK\H1\A;

use Illuminate\Http\Resources\Json\JsonResource;

class zviResourse extends JsonResource
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
//            'id' => $this->id,
            'LocalTime' => $this->LocalTime,

            'ZVI7000A' => $this->ZVI7000A,
            'ZVI7001A' => $this->ZVI7001A,
            'ZVI7002A' => $this->ZVI7002A,
            'ZVI7003A' => $this->ZVI7003A,
        ];
    }
}
