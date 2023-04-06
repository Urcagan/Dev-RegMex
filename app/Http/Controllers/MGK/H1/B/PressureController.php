<?php

namespace App\Http\Controllers\MGK\H1\B;

use App\Http\Controllers\Controller;
use App\Http\Resources\MGK\H1\B\pressureResourse;
use App\Models\H1B;
use Illuminate\Http\Request;


class PressureController extends Controller
{
    public function __invoke()
    {
        $data = H1B::all();
        return pressureResourse::collection($data);
        // return pressureResourse::collection(H1B::all());
        // // return $data;
    }
}

