<?php

namespace App\Http\Controllers\MGK\H1\A;

use App\Http\Controllers\Controller;
use App\Http\Resources\MGK\H1\A\H1AResourse;
use App\Models\H1A;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class table_Controller extends Controller
{

    public function __invoke()
    {
       // поиск максимального id  для выявления последней записи
        $maxId = DB::table('MGK_H1A')->max('id');

        // Поиск последних 12и записей
        $data = DB::table('MGK_H1A')
            ->whereBetween('id', [$maxId-11, $maxId])
            ->get();
        return H1AResourse::collection($data);
//        $dkA = DK_A::all();
//        $dkA = DB::select('select top 50 * from dk_a_points ');
//        $dkA = DB::select('select * from dk_a_points where id = :id', ['id' => 2]);
//        return DkAResource::collection($dkA);
//        return $dkA;
    }
}

