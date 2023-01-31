<?php

namespace App\Http\Controllers\WebInterface\Unit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\WebInterface\Unit;

class UnitController extends Controller
{
    public function __invoke($id)
    {
        // $plant = Plant::all();
        // $plant = $plant->find($id);
        $plant = Unit::where('id', $id) -> get();
        return $plant;     
    }
}
