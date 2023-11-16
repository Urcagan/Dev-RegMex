<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TbPlant;
use App\Models\TbComplex;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plants = TbPlant::all();
        $complexes = TbComplex::all();
      
        $data = [];
        foreach ($plants as $plant) {
            foreach ($complexes as $complex) {
                if ($plant['Complex_id'] === $complex['id']) {
                    $data[] = [
                        'id' => $plant['id'],
                        'Name' => $plant['Name'],
                        'Complex_id' => $complex['id'],
                        'Complex' => $complex['Name'],
                    ];
                }
            }
        }
        dd($plant);
        dd($data);
        // return view('plant.index', compact('plants'));
        return view('plant.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TbPlant $plant)
    {
        return view('plant.show', compact('plant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
