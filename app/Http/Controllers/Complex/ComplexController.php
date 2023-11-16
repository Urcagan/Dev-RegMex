<?php

namespace App\Http\Controllers\Complex;

use App\Http\Controllers\Controller;
use App\Models\TbComplex;
use Illuminate\Http\Request;
use App\Http\Requests\Complex\StoreRequest;
use App\Http\Requests\Complex\UpdateRequest;

use App\Models\H1A;

class ComplexController extends Controller
{
    // Для отображения списка ресурсов
    public function index()
    {
        $complexes = TbComplex::all();

        return view('complex.index', compact('complexes'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        TbComplex::firstOrCreate($data);

        return redirect()->route('complex.index');
    }

    // Для отображения конкретного ресурса
    public function show(TbComplex $complex)
    {
        return view('complex.show', compact('complex'));
    }

    // Для отображения формы создания нового ресурса
    public function create()
    {
        return view('complex.create');
    }

    public function edit(TbComplex $complex)
    {
        return view('complex.edit', compact('complex'));
    }

    public function update(UpdateRequest $request, TbComplex $complex)
    {
        $data = $request->validated();
        $complex->update($data);

        return view('complex.show', compact('complex'));
    }

    // Для удаления конкретного ресурса из БД
    public function delete(TbComplex $complex)
    {
        $complex->delete();

        return redirect()->route('complex.index');
    }
}
