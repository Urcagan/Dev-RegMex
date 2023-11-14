<?php

namespace App\Http\Controllers;

use App\Models\TbComplex;
use Illuminate\Http\Request;

class TbComplexController extends Controller
{
    public function index() // Для отображения списка ресурсов
    {
        //dd('index');
        $complexes = TbComplex::all();
        //dd($complexes);
        return response()->json($complexes);
    }
   
    public function store(Request $request)
    {
        $complex = new TbComplex;
        $complex->Name = $request->input('Name');
        $complex->Description = $request->input('Description');
        $complex->save();

        return response()->json($complex);
    }

    public function show($id) // Для отображения конкретного ресурса
    {
        $complex = TbComplex::find($id);
        return response()->json($complex);
    }

    public function update(Request $request, $id)
    {
        $complex = TbComplex::find($id);
        $complex->Name = $request->input('Name');
        $complex->Description = $request->input('Description');
        $complex->save();

        return response()->json($complex);
    }

    public function create() // Для отображения формы создания нового ресурса
    {
        TbComplex::create([
            'Name' => 'КТУ ГПВГ',
            'Description' => 'Глубокая переработка вакуумного газойля',
        ]);
        dd(TbComplex::all());
    }

    public function destroy($id) // Для удаления конкретного ресурса из БД
    {
        $complex = TbComplex::find($id);
        
        if (!$complex) {
            return response()->json(['error'=>'Такого комплекса нету'], 404);
        }

        $complex->delete();

        return response()->json(['message' => 'Complex deleted']);
    }

}
