<?php

namespace App\Http\Controllers\WebInterface\Unit;

use App\Http\Controllers\Controller;
use App\Models\WebInterface\Unit;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = Unit::all();
        return $data;
    }
}
