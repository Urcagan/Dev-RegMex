<?php

namespace App\Http\Controllers\Plant;

use App\Http\Controllers\Controller;
use App\Models\TbComplex;
use Illuminate\Http\Request;
use App\Models\TbPlant;
use App\Http\Requests\Plant\StoreRequest;
use App\Http\Requests\Plant\UpdateRequest;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $plants = TbPlant::with('complex')->get();

        return view('plant.index', compact('plants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $complexes = TbComplex::all();
        return view('plant.create', compact('complexes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        TbPlant::firstOrCreate($data);

        return redirect()->route('plant.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TbPlant $plant)
    {
        $plant = TbPlant::with('complex')->find($plant->id);
        // dd($plant);
        return view('plant.show', compact('plant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TbPlant $plant)
    {
        $complexes = TbComplex::all();

        return view('plant.edit', compact('plant', 'complexes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, TbPlant $plant)
    {
        $data = $request->validated();
        $plant->update($data);

        return view('plant.show', compact('plant'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TbPlant $plant)
    {
        $plant->delete();
        
        return redirect()->route('plant.index');
    }
}
