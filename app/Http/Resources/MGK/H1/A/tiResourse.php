<?php

namespace App\Http\Resources\MGK\H1\A;

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
        return [
//            'id' => $this->id,
            'LocalTime' => $this->LocalTime,

            'KVI7000A' => $this->KVI7000A,

            'TI7006A' => $this->TI7006A,
            'TI7007A' => $this->TI7007A,
            'TI7008A' => $this->TI7008A,
            'TI7009A' => $this->TI7009A,
            'TI7010A' => $this->TI7010A,
            'TI7011A' => $this->TI7011A,
            'TI7012A' => $this->TI7012A,
            'TI7013A' => $this->TI7013A,
            'TI7014A' => $this->TI7014A,
            'TI7015A' => $this->TI7015A,
            'TI7043A' => $this->TI7043A,
        ];
    }
}
