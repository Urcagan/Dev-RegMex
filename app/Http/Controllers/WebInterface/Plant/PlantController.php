<?php

namespace App\Http\Controllers\WebInterface\Plant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\WebInterface\Plant;

class PlantController extends Controller
{
    public function __invoke($id)
    {
        // $plant = Plant::all();
        // $plant = $plant->find($id);
        $plant = Plant::where('complex_id', $id) -> get();
        return $plant;     
    }
}
