<?php

namespace App\Http\Resources\MGK\H1\A;

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
        return [
//            'id' => $this->id,
            'LocalTime' => $this->LocalTime,
            'PI7026A' => $this->PI7026A,
            'PI7028A' => $this->PI7028A,
            'PI7024A' => $this->PI7024A,
//            'PDI7013A' => $this->PDI7013A,
        ];
    }
}
