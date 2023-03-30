<?php

namespace App\Http\Resources\MGK\H1\B;

use Illuminate\Http\Resources\Json\JsonResource;

class tiResourse extends JsonResource
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

            'TI7006B' => $this->TI7006B,
            'TI7007B' => $this->TI7007B,
            'TI7008B' => $this->TI7008B,
            'TI7009B' => $this->TI7009B,
            'TI7010B' => $this->TI7010B,
            'TI7011B' => $this->TI7011B,
            'TI7012B' => $this->TI7012B,
            'TI7013B' => $this->TI7013B,
            'TI7014B' => $this->TI7014B,
            'TI7015B' => $this->TI7015B,
            'TI7043B' => $this->TI7043B,
        ];
    }
}
