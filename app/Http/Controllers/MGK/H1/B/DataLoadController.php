<?php

namespace App\Http\Controllers\MGK\H1\B;

use App\Http\Controllers\Controller;
use App\Http\Resources\MGK\H1\B\DataLoadResourse;
use App\Models\H1B;
use Illuminate\Http\Request;


class DataLoadController extends Controller
{
    public function __invoke()
    {
        $data = H1B::all();
        return DataLoadResourse::collection($data);
    }
}

