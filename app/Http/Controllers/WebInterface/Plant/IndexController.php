<?php

namespace App\Http\Controllers\WebInterface\Plant;

use App\Http\Controllers\Controller;
use App\Models\WebInterface\Plant;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = Plant::all();
        return $data;
    }
}
