<?php

namespace App\Http\Controllers\MGK\H1;

use App\Http\Controllers\Controller;
use App\Http\Resources\MGK\H1\H1A_Resourse;
use App\Models\H1A;
use Illuminate\Http\Request;


class H1A_Controller extends Controller
{
    public function all() 
    {
        $data = H1A::all();
        return H1A_Resourse::collection($data);
    }

    public function show($id) 
    {
        $data = H1A::where('id',$id) -> get();
        return H1A_Resourse::collection($data);
    }

    // public function between($id_1, $ id_2) 
    // {
    //     $data = H1A::where('id',$id) -> get();
    //     return H1A_Resourse::collection($data);
    // }
}

