<?php

namespace App\Http\Controllers\Point;

use App\Http\Controllers\Controller;
use App\Models\TbPoint;
use Illuminate\Http\Request;
use App\Http\Requests\Point\StoreRequest;
use App\Http\Requests\Point\UpdateRequest;
use App\Models\TbUnit;
use App\Models\UOMUnit;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $points = TbPoint::with('uomunit', 'units')->get();
        // $points = TbPoint::all();
        // dd($points);
        return view('point.index', compact('points'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $uomunits = UOMUnit::all();
        $units = TbUnit::all();
        return view('point.create', compact('uomunits', 'units'));
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
        TbPoint::firstOrCreate($data);

        return redirect()->route('point.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TbPoint $point)
    {
        // $unit = TbUnit::with('plant')->find($unit->id);
        $point = TbPoint::with('uomunit', 'units')->find($point->id);
        // dd($point);
        return view('point.show', compact('point'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TbPoint $point)
    {
        $uomunits = UOMUnit::all();
        $units = TbUnit::all();

        return view('point.edit', compact('point', 'uomunits', 'units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, TbPoint $point)
    {
        $data = $request->validated();
        $point->update($data);

        return view('point.show', compact('point'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TbPoint $point)
    {
        $point->delete();

        return redirect()->route('point.index');
    }
}
