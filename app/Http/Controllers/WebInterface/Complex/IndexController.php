<?php

namespace App\Http\Controllers\WebInterface\Complex;

use App\Http\Controllers\Controller;
// use App\Http\Resources\ComplexResourse;
use App\Http\Resources\ComplexResourse;
use App\Models\WebInterface\Complex;


class IndexController extends Controller
{
    public function __invoke()
    {
        $complexes = Complex::all();
        return $complexes;
    }
}
