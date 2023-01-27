<?php

namespace App\Http\Controllers\DkA;

use App\Http\Controllers\Controller;
use App\Http\Resources\DkA\DkAResource;
use App\Models\DK_A;
use Illuminate\Http\Request;


class DkAController extends Controller
{

    public function __invoke()
    {
        $dkA = DK_A::all();
        return DkAResource::collection($dkA);
    }
}

