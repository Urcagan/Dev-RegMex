<?php

namespace App\Http\Controllers\UOMUnit;

use App\Http\Controllers\Controller;
use App\Models\UOMUnit;
use Illuminate\Http\Request;
use App\Http\Requests\UOMUnit\StoreRequest;
use App\Http\Requests\UOMUnit\UpdateRequest;

class UOMUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $uomunits = UOMUnit::all();

        return view('uomunit.index', compact('uomunits'));
        // return view('uomunit.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('uomunit.create');
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
        UOMUnit::firstOrCreate($data);

        return redirect()->route('uomunit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UOMUnit $uomunit)
    {
        // $unit = TbUnit::with('plant')->find($unit->id);
        return view('uomunit.show', compact('uomunit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UOMUnit $uomunit)
    {
        return view('uomunit.edit', compact('uomunit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, UOMUnit $uomunit)
    {
        $data = $request->validated();
        $uomunit->update($data);

        return view('uomunit.show', compact('uomunit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UOMUnit $uomunit)
    {
        $uomunit->delete();
        
        return redirect()->route('uomunit.index');
    }
}
