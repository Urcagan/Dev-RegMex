<?php

namespace App\Http\Resources\MGK\H1\B;

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
        $LocalTime = date_create($this->LocalTime);
        return [
//            'id' => $this->id,
            // 'LocalTime' => $this->LocalTime,
            'LocalTime' => date_format($LocalTime, 'd.m.y H:i'),
            'KVI7000B' => $this->KVI7000B,
            'XVI7000B' => $this->XVI7000B,
            'XVI7001B' => $this->XVI7001B,
            'XVI7002B' => $this->XVI7002B,
            'XVI7003B' => $this->XVI7003B,
            'XVI7004B' => $this->XVI7004B,
            'XVI7005B' => $this->XVI7005B,
            'XVI7006B' => $this->XVI7006B,
            'XVI7007B' => $this->XVI7007B,
        ];
    }
}
