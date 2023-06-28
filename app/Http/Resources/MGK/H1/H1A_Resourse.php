<?php

namespace App\Http\Resources\MGK\H1;

use Illuminate\Http\Resources\Json\JsonResource;

class H1A_Resourse extends JsonResource
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
            'id' => $this->id,
            'LocalTime' => $this->LocalTime,
            // 'LocalTime' => date_format($LocalTime, 'd.m.y H:i'),
            'PI7026A' => $this->PI7026A,
            'PI7028A' => $this->PI7028A,
            'PI7024A' => $this->PI7024A,
//            'PDI7013A' => $this->PDI7013A,
        ];
    }
}
