<?php

namespace App\Http\Controllers\MGK\H1\B;

use App\Http\Controllers\Controller;
use App\Http\Resources\MGK\H1\B\H1BResourse;
use App\Models\H1B;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Table_Controller extends Controller
{
    public function __invoke()
    {
       // поиск максимального id  для выявления последней записи
        $maxId = DB::table('MGK_H1B')->max('id');

        // Поиск последних 12и записей
        $data = DB::table('MGK_H1B') 
            
            ->whereBetween('id', [$maxId-11, $maxId])
            ->get();
           

            $records = array(
                array(
                    'id' => 2135,
                    'first_name' => 'John',
                    'last_name' => 'Doe',
                ),
                array(
                    'id' => 3245,
                    'first_name' => 'Sally',
                    'last_name' => 'Smith',
                ),
                array(
                    'id' => 5342,
                    'first_name' => 'Jane',
                    'last_name' => 'Jones',
                ),
                array(
                    'id' => 5623,
                    'first_name' => 'Peter',
                    'last_name' => 'Doe',
                )
            );

        // return H1BResourse::collection($data);
            $arr = $data->toArray();
            // $first_names = array_column($arr, 'LocalTime');
            dd($arr);
        // return H1BResourse::collection($data->toArray());
        return $data->toArray();
        // return $data;
        // return $first_names;


            // $val =array_column($data, 'LocalTime');
        //   return ( $data);
        
        //   return ($data);

    //        $dkA = DK_A::all();
    //        $dkA = DB::select('select top 50 * from dk_a_points ');
    //        $dkA = DB::select('select * from dk_a_points where id = :id', ['id' => 2]);
    //        return DkAResource::collection($dkA);
    //        return $dkA;
    }
}

