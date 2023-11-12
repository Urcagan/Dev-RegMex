<?php

namespace App\Http\Controllers;

use App\Models\Goods;

use Illuminate\Http\Request;

class GoodsController extends Controller
{

    // $rowArr = [
    //     'ProductID' => 'DEFAULT',
    //     'ProductName' => 'XXX'
    // ];

    public function create()
    {
        Goods::create([
            'ProductName' => 'XXX',
        ]);
        dd('created');
    }
}
