<?php

namespace App\Http\Controllers\DkA;

use App\Http\Controllers\Controller;
use App\Http\Resources\DkA\DkAResource;
use App\Models\DK_A;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DkAController_Top extends Controller
{

    public function __invoke()
    {
//        $dkA = DK_A::all();
        $dkA = DB::select('select top 50 * from dk_a_points ');
//        $dkA = DB::select('select * from dk_a_points where id = :id', ['id' => 2]);
        return DkAResource::collection($dkA);
//        return $dkA;
    }
}

