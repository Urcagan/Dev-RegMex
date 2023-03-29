<?php

namespace App\Http\Resources\MGK\H1\A;

use Illuminate\Http\Resources\Json\JsonResource;

class H1AResourse extends JsonResource
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
            'PI7026A' => round($this->PI7026A,2),
            'PI7028A' => round($this->PI7028A,2),
            'PI7024A' => round($this->PI7024A,2),
            'PDI7013A' => round($this->PDI7013A,2),
            'ZVI7000A' => round($this->ZVI7000A,2),
            'ZVI7001A' => round($this->ZVI7001A,2),
            'ZVI7002A' => round($this->ZVI7002A,2),
            'ZVI7003A' => round($this->ZVI7003A,2),
            'KVI7000A' => round($this->KVI7000A,2),
            'XVI7000A' => round($this->XVI7000A,2),
            'XVI7001A' => round($this->XVI7001A,2),
            'XVI7002A' => round($this->XVI7002A,2),
            'XVI7003A' => round($this->XVI7003A,2),
            'XVI7004A' => round($this->XVI7004A,2),
            'XVI7005A' => round($this->XVI7005A,2),
            'XVI7006A' => round($this->XVI7006A,2),
            'XVI7007A' => round($this->XVI7007A,2),
            ],
            [
            //            'id' => $this->id,
            'LocalTime' => date_format($LocalTime, 'd.m.y H:i'),
            'TI7006A' => round($this->TI7006A,2),
            'TI7007A' => round($this->TI7007A,2),
            'TI7008A' => round($this->TI7008A,2),
            'TI7009A' => round($this->TI7009A,2),
            'TI7010A' => round($this->TI7010A,2),
            'TI7011A' => round($this->TI7011A,2),
            'TI7012A' => round($this->TI7012A,2),
            'TI7013A' => round($this->TI7013A,2),
            'TI7014A' => round($this->TI7014A,2),
            'TI7015A' => round($this->TI7015A,2),
            'TI7043A' => round($this->TI7043A,2),
            'LI7008A' => round($this->LI7008A,2),
            ]
        ];
    }
}
