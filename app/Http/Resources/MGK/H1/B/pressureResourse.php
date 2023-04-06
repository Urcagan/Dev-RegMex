<?php

namespace App\Http\Resources\MGK\H1\B;

use Illuminate\Http\Resources\Json\JsonResource;

class pressureResourse extends JsonResource
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
            'PI7026B' => round($this->PI7026B,3),
            'PI7028B' => round($this->PI7028B,3),
            'PI7024B' => round($this->PI7024B,3),
            
        ];
    }
}
