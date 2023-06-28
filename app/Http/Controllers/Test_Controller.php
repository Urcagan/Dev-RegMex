<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\MGK\H1\H1A_Resourse;
use App\Models\H1A;
use Illuminate\Http\Request;


class Test_Controller extends Controller
{
    
    public function testRequest(Request $request)
    {
        $data = $request->all();

        //dd($data);

        return ' Тест Контроллера с Request ';
    }
    
    public function filter_id(Request $request)
    {
        $query = H1A::limit(10);

        if ($request->filled('id'))
        {
            $query = H1A::limit(1);
        }
        
        // Поиск до указанной даты (after)    
        if ($request->filled('afterDate'))
        {
            $date = $request->afterDate;
            $query = H1A::whereDate('LocalTime','<=', $date);
        }

        // Поиск после указанной даты (before)
        if ($request->filled('beforeDate'))
        {
            $date = $request->beforeDate;
            $query = H1A::whereDate('LocalTime','>=', $date);
        }

        // Поиск данных между указанных дат (between)
        if ($request->filled('startDate', 'endDate'))
        {
            $startDate = $request->startDate;
            $endDate = $request->endDate;
            $query = H1A::whereDate('LocalTime','>=', $startDate)->whereDate('LocalTime','<=', $endDate);
        }

        if ($request->filled('mass'))
        {
            $startDate = $request->startDate;
            $endDate = $request->endDate;
            $query = H1A::whereDate('LocalTime','>=', $startDate)->whereDate('LocalTime','<=', $endDate);
        }

        $resp = $query->get();

        return H1A_Resourse::collection($resp);
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

