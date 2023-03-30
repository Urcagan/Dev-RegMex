<?php

namespace App\Http\Resources\MGK\H1\B;

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
        $LocalTime = date_create($this->LocalTime);
        return [
//            'id' => $this->id,
            // 'LocalTime' => $this->LocalTime,
            'LocalTime' => date_format($LocalTime, 'd.m.y H:i'),

            'ZVI7000B' => $this->ZVI7000B,
            'ZVI7001B' => $this->ZVI7001B,
            'ZVI7002B' => $this->ZVI7002B,
            'ZVI7003B' => $this->ZVI7003B,
        ];
    }
}
