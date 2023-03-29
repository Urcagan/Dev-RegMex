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
        $DB_Name = 'MGK_H1A';
       // поиск максимального id  для выявления последней записи
        $maxId = DB::table($DB_Name)->max('id');

        // Поиск последних 12и записей
        $data = DB::table($DB_Name)
            ->whereBetween('id', [$maxId-11, $maxId])
            ->get();
        return H1AResourse::collection($data);
    }
}

