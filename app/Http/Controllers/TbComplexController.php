<?php

namespace App\Http\Controllers;

use App\Models\TbComplex;
use Illuminate\Http\Request;

class TbComplexController extends Controller
{
    public function show(){
        dd(('show'));
    }
    
    public function create()
    {
        TbComplex::create([
            'Name' => 'ASD',
            'Description' => 'Описание комплекса',
        ]);
        dd('created');
    }
}
