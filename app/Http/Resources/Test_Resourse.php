<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Test_Resourse extends JsonResource
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
//         return [
//             // 'id' => $this->id,
//             'LocalTime' => $this->LocalTime,
//             // 'LocalTime' => date_format($LocalTime, 'd.m.y H:i'),
//             'PI7026A' => $this->PI7026A,
//             'PI7028A' => $this->PI7028A,
//             'PI7024A' => $this->PI7024A,
            
// //            'PDI7013A' => $this->PDI7013A,
//         ];

        return [
             [
                'name' => 'PI7026A',
                'LocalTime' => $this->LocalTime,
                'value' => round($this->PI7026A, 3),
                ],
             [
                'name' => 'PI7028A',
                'LocalTime' => $this->LocalTime,
                'value' => round($this->PI7028A, 3),
                ],
             [
                'name' => 'PI7024A',
                'LocalTime' => $this->LocalTime,
                'value' => round($this->PI7024A, 3),
                ],
        ];

//         return [
//             // 'id' => $this->id,
//             [ 'LocalTime' => $this->LocalTime, 'PI7026A' => $this->PI7026A] ,
//             [ 'LocalTime' => $this->LocalTime, 'PI7028A' => $this->PI7028A],
//             [ 'LocalTime' => $this->LocalTime, 'PI7024A' => $this->PI7024A],
// //            'PDI7013A' => $this->PDI7013A,
//         ];

    }
}
