<?php

namespace App\Http\Resources\MGK\H1\B;

use Illuminate\Http\Resources\Json\JsonResource;

class H1BResourse extends JsonResource
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
            [
            //            'id' => $this->id,
  
            'LocalTime' => date_format($LocalTime, 'd.m.y H:i'),
            'PI7026B' => round($this->PI7026B,2),
            'PI7028B' => round($this->PI7028B,2),
            'PI7024B' => round($this->PI7024B,2),
            'PDI7013B' => round($this->PDI7013B,2),
            'ZVI7000B' => round($this->ZVI7000B,2),
            'ZVI7001B' => round($this->ZVI7001B,2),
            'ZVI7002B' => round($this->ZVI7002B,2),
            'ZVI7003B' => round($this->ZVI7003B,2),
            'KVI7000B' => round($this->KVI7000B,2),
            'XVI7000B' => round($this->XVI7000B,2),
            'XVI7001B' => round($this->XVI7001B,2),
            'XVI7002B' => round($this->XVI7002B,2),
            'XVI7003B' => round($this->XVI7003B,2),
            'XVI7004B' => round($this->XVI7004B,2),
            'XVI7005B' => round($this->XVI7005B,2),
            'XVI7006B' => round($this->XVI7006B,2),
            'XVI7007B' => round($this->XVI7007B,2),
            ],
            [
            //            'id' => $this->id,
            'LocalTime' => date_format($LocalTime, 'd.m.y H:i'),
            'TI7006B' => round($this->TI7006B,2),
            'TI7007B' => round($this->TI7007B,2),
            'TI7008B' => round($this->TI7008B,2),
            'TI7009B' => round($this->TI7009B,2),
            'TI7010B' => round($this->TI7010B,2),
            'TI7011B' => round($this->TI7011B,2),
            'TI7012B' => round($this->TI7012B,2),
            'TI7013B' => round($this->TI7013B,2),
            'TI7014B' => round($this->TI7014B,2),
            'TI7015B' => round($this->TI7015B,2),
            'TI7043B' => round($this->TI7043B,2),
            'LI7008B' => round($this->LI7008B,2),
            ]
        ];
    }
}
