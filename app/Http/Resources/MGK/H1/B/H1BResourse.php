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
        return [
//            'id' => $this->id,
            'LocalTime' => $this->LocalTime,
            'PI7026B' => $this->PI7026B,
            'PI7028B' => $this->PI7028B,
            'PI7024B' => $this->PI7024B,
            'PDI7013B' => $this->PDI7013B,
            'ZVI7000B' => $this->ZVI7000B,
            'ZVI7001B' => $this->ZVI7001B,
            'ZVI7002B' => $this->ZVI7002B,
            'ZVI7003B' => $this->ZVI7003B,
            'KVI7000B' => $this->KVI7000B,
            'XVI7000B' => $this->XVI7000B,
            'XVI7001B' => $this->XVI7001B,
            'XVI7002B' => $this->XVI7002B,
            'XVI7003B' => $this->XVI7003B,
            'XVI7004B' => $this->XVI7004B,
            'XVI7005B' => $this->XVI7005B,
            'XVI7006B' => $this->XVI7006B,
            'XVI7007B' => $this->XVI7007B,
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
            'LI7008B' => $this->LI7008B,
        ];
    }
}
