<?php

namespace App\Http\Controllers\WebInterface\Unit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\WebInterface\Unit;
use App\Http\Resources\WibInterface\UnitResource;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    public function __invoke($id)
    {
        // $plant = Plant::all();
        // $plant = $plant->find($id); 
        $unit = DB::table('Units')->where('id',$id)->get();
        // $plant = Unit::where('id', $id) -> get();
        return $unit;     
    }
}
