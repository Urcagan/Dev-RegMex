<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\Test_Resourse;
use App\Models\H1A;
use ArrayObject;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Array_;

class LoadData_Controller extends Controller
{
    
    public function loadRequest()
    {
        
        $data = H1A::all();
        // $data = H1A::limit(1);
        // dd($data);

        // return ' Load Data Controller ';
        return Test_Resourse::collection($data);
        // return $data;
    }

    public function OneRequest()
    {
        
        $query = H1A::limit(3);
        // $query = H1A::take(10);
        // dd($data);

        $resp = $query->get();
        // dd($resp);
        // return ($resp);
        
        $V_collect = Test_Resourse::collection($resp);

        return $V_collect;

    }
    
    
    // public function all() 
    // {
    //     $data = H1A::all();
    //     return H1A_Resourse::collection($data);
    // }

    // public function show($id) 
    // {
    //     $data = H1A::where('id',$id) -> get();
    //     return H1A_Resourse::collection($data);
    // }

    // public function between($id_1, $ id_2) 
    // {
    //     $data = H1A::where('id',$id) -> get();
    //     return H1A_Resourse::collection($data);
    // }
}

