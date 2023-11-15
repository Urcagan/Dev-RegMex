<?php

namespace App\Http\Controllers\Complex;

use App\Http\Controllers\Controller;
use App\Models\TbComplex;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\HttpCache\Store;
use App\Http\Requests\Complex\StoreRequest;
use App\Http\Requests\Complex\UpdateRequest;

class ComplexController extends Controller
{
    public function index(){ // Для отображения списка ресурсов
        //dd('index');
        $complexes = TbComplex::all();
        //dd($complexes);
        // dd(compact('complexes'));
        return view('complex.index', compact('complexes'));
    }

    public function store(StoreRequest $request){
        $data = $request->validated();
        TbComplex::firstOrCreate($data);

        return redirect()->route('complex.index');
    }

    public function show(TbComplex $complex){ // Для отображения конкретного ресурса
        return view('complex.show', compact('complex'));
    }

    public function create(){ // Для отображения формы создания нового ресурса
        return view('complex.create');
    }

    public function edit(TbComplex $complex){
        return view('complex.edit', compact('complex'));
    }

    public function update(UpdateRequest $request, TbComplex $complex){
        $data = $request->validated();
        $complex->update($data);

        return view('complex.show', compact($complex));
    }

    public function delet(TbComplex $complex){ // Для удаления конкретного ресурса из БД
        $complex->delete();

        return redirect()->route('complex.index');
    }
}
