<?php

namespace App\Http\Controllers\MGK\H1\B;

use App\Http\Controllers\Controller;
use App\Http\Resources\MGK\H1\B\H1BResourse;
// use App\Models\H1B;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Table_Controller extends Controller
{
    public function __invoke()
    {
        $DB_Name = 'MGK_H1B';
       // поиск максимального id  для выявления последней записи
        $maxId = DB::table($DB_Name)->max('id');
 
        // Поиск последних 12и записей
        $data = DB::table($DB_Name) 
            ->whereBetween('id', [$maxId-11, $maxId])
            ->get();
           return H1BResourse::collection($data);
    }
}

