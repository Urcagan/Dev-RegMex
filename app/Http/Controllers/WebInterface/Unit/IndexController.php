<?php

namespace App\Http\Controllers\WebInterface\Unit;

use App\Http\Controllers\Controller;
use App\Models\WebInterface\Unit;
use Illuminate\Http\Request;
use App\Http\Resources\WibInterface\UnitResource;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        if (\Schema::hasTable('Units')){
            // $data = DB::table('Units')->get();
            $tableName = 'units';
            $SQL = 'select * from ' ;
            $SQL .= $tableName;
            $data = DB::select($SQL);
            // return $SQL;
            return UnitResource::collection($data); 
            // return 'Таблица существует ';
        } else {
            return 'Таблица отсутствует в БД';
        }
        
    }
}
