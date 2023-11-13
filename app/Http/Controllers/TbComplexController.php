<?php

namespace App\Http\Controllers;

use App\Models\TbComplex;
use Illuminate\Http\Request;

class TbComplexController extends Controller
{
    public function index() // Для отображения списка ресурсов
    {
        $complexes = TbComplex::all();
        dd($complexes);

    }
   
    public function create() // Для отображения формы создания нового ресурса
    {
        TbComplex::create([
            'Name' => 'КТУ ГПВГ',
            'Description' => 'Глубокая переработка вакуумного газойля',
        ]);
        dd(TbComplex::all());
    }

    public function show() // Для отображения конкретного ресурса
    {
        dd(('show'));
    }

    public function destroy($guid) // Для удаления конкретного ресурса из БД
    {
        TbComplex::destroy($guid);
        return redirect()->route('complexes.index');
    }
}
