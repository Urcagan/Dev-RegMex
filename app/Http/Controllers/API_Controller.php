<?php
//* Тестовый контроллер для тестирования API маршрута
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebInterface\Complex;

class API_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $collection = Complex::query(); //создать базовый запрос, что-то эквивалентное: SELECT * FROM some_table

        $allowedFilterFields = (new Complex())->getFillable(); // Получаем имена столбцов таблици
        $allowedSortFields = ['id', ...$allowedFilterFields]; // Формируем массив с полями по которым будет осуществлятся сортировка
        $allowedSortDirections = ['asc','desc'];    // Формируем массив по которому осуществляетс направление сортировки

        $sortBy = $request->query('sortby','id');   // Получаем из адресной строки параметр с именем sortby, при его отсутствии задается по умолчанию значение id
        $sortDir = strtolower($request->query('sortdir', 'asc'));
        if(!in_array($sortBy, $allowedSortFields)) $sortBy = $allowedSortFields[0];   // Валидация значения в ключе (проверка кльча sortBy на совпадение со значением в массиве allowedSortFields)
        if(!in_array($sortDir, $allowedSortDirections)) $sortDir = $allowedSortDirections[0];
        //dd($collection->get());
        return $collection->get(); //$request; //$sortDir;
        // return $allowedSortFields;
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
    public function show($id)
    {
        //
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
