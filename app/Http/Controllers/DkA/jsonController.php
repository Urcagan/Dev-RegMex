<?php

namespace App\Http\Controllers\DkA;

use App\Http\Controllers\Controller;
use App\Http\Resources\DkA\DkAResource;
use App\Models\DK_A;
use Illuminate\Http\Request;


class jsonController extends Controller
{

    public function __invoke()
    {
        $dkA = DK_A::all();

        $colData = DkAResource::collection($dkA);
        $plucked = $colData->pluck('PI7026A', 'LocalTime');
        return $plucked;
//        dump($dkA[1]);
//        return $colData;
    }
}

