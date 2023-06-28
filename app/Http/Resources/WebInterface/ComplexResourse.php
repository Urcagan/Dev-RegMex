<?php

namespace App\Http\Resources\WebInterface;

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
            'id' => $this->id,
            'NameComplex' => $this->NameComplex,
            'Description' => $this->Description,
        ];
    }
}
