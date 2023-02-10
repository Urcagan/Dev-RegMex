<?php

namespace App\Http\Controllers\WebInterface\Plant;

use App\Http\Controllers\Controller;
use App\Models\WebInterface\Unit;


class CreateController extends Controller{

    public function __invoke()
    {
        $complexes = Unit::all();
        return view( 'plant.create', compact('complexes'));
    }
}
