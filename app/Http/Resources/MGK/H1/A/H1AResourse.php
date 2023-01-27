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
        return [
//            'id' => $this->id,
            'LocalTime' => $this->LocalTime,
            'PI7026A' => $this->PI7026A,
            'PI7028A' => $this->PI7028A,
            'PI7024A' => $this->PI7024A,

            'PDI7013A' => $this->PDI7013A,

            'ZVI7000A' => $this->ZVI7000A,
            'ZVI7001A' => $this->ZVI7001A,
            'ZVI7002A' => $this->ZVI7002A,
            'ZVI7003A' => $this->ZVI7003A,

            'KVI7000A' => $this->KVI7000A,

            'XVI7000A' => $this->XVI7000A,
            'XVI7001A' => $this->XVI7001A,
            'XVI7002A' => $this->XVI7002A,
            'XVI7003A' => $this->XVI7003A,

            'XVI7004A' => $this->XVI7004A,
            'XVI7005A' => $this->XVI7005A,
            'XVI7006A' => $this->XVI7006A,
            'XVI7007A' => $this->XVI7007A,

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
            'LI7008A' => $this->LI7008A,

        ];
    }
}
