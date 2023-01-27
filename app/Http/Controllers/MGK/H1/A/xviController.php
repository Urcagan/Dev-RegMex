<?php

namespace App\Http\Controllers\MGK\H1\A;

use App\Http\Controllers\Controller;
use App\Http\Resources\MGK\H1\A\xviResourse;
use App\Models\H1A;
use Illuminate\Http\Request;


class xviController extends Controller
{
    public function __invoke()
    {
        $data = H1A::all();
        return xviResourse::collection($data);
    }
}

