<?php

namespace App\Http\Resources\MGK\H1\A;

use Illuminate\Http\Resources\Json\JsonResource;

class xviResourse extends JsonResource
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
            'KVI7000A' => $this->KVI7000A,

            'XVI7000A' => $this->XVI7000A,
            'XVI7001A' => $this->XVI7001A,
            'XVI7002A' => $this->XVI7002A,
            'XVI7003A' => $this->XVI7003A,

            'XVI7004A' => $this->XVI7004A,
            'XVI7005A' => $this->XVI7005A,
            'XVI7006A' => $this->XVI7006A,
            'XVI7007A' => $this->XVI7007A,
        ];
    }
}
