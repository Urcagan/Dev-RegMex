<?php

namespace App\Http\Controllers\WebInterface\Unit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\WebInterface\Unit;
use App\Http\Resources\WebInterface\UnitResource;
use Illuminate\Support\Facades\DB;

class UnitsGroupController extends Controller
{
    public function __invoke($PlantId)
    {
        // $plant = Plant::all();
        // $plant = $plant->find($id); 
        $unit = DB::table('Units')->where('plant_id',$PlantId)->get();
        // $plant = Unit::where('id', $id) -> get();
        // return $unit;     
        return UnitResource::collection($unit); 
    }
}
