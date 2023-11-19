<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use App\Models\TbUnit;
use Illuminate\Http\Request;
use App\Models\TbPlant;
use App\Http\Requests\Unit\StoreRequest;
use App\Http\Requests\Unit\UpdateRequest;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $units = TbUnit::with('plant')->get();

        return view('unit.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plants = TbPlant::all();
        return view('unit.create', compact('plants'));
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
        TbUnit::firstOrCreate($data);

        return redirect()->route('unit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TbUnit $unit)
    {
        $unit = TbUnit::with('plant')->find($unit->id);
        // dd($plant);
        return view('unit.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TbUnit $unit)
    {
        $plants = TbPlant::all();

        return view('unit.edit', compact('unit', 'plants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, TbUnit $unit)
    {
        $data = $request->validated();
        $unit->update($data);

        return view('unit.show', compact('unit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TbUnit $unit)
    {
        $unit->delete();
        
        return redirect()->route('unit.index');
    }
}
