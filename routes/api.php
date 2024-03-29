<?php

use App\Http\Controllers\API_Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//* запросы для интерфейса прилажения
Route::group(['namespace' => 'App\Http\Controllers\WebInterface\Complex', 'prefix' => 'interface'], function () {
    Route::get('/complex', 'IndexController');
});

Route::group(['namespace' => 'App\Http\Controllers\WebInterface\Plant', 'prefix' => 'interface'], function () {
    Route::get('/plant', 'IndexController');
    Route::get('/plant/{complex_id}', 'PlantController');
});

Route::group(['namespace' => 'App\Http\Controllers\WebInterface\Unit', 'prefix' => 'interface'], function () {
    Route::get('/unit', 'IndexController');
    Route::get('/unitGroup/{group_id}', 'UnitsGroupController');
    Route::get('/unit/{plant_id}', 'UnitController');
});


// Route::get('complex', 'App\Http\Controllers\TbComplexController@index');
// Route::post('complex', 'App\Http\Controllers\TbComplexController@store');
Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'complex'], function () {
    Route::get('/', 'TbComplexController@index');
    Route::post('/', 'TbComplexController@store');
    Route::get('/{id}', 'TbComplexController@show');
    Route::put('/{id}', 'TbComplexController@update');
    Route::delete('/{id}', 'TbComplexController@destroy');
});

//* роуты для содержимого приложения
Route::group(['namespace' => 'App\Http\Controllers\DkA', 'prefix' => 'dk_a_data'], function () {
    Route::get('/', 'DkAController');

    //    Route::post('/', 'StoreController');
    //    Route::get('/', 'IndexController');
    //    Route::get('/{person}', 'ShowController');
    //    Route::patch('/{person}', 'UpdateController');
    //    Route::delete('/{person}', 'DeleteController');
});

Route::group(['namespace' => 'App\Http\Controllers\DkA', 'prefix' => 'dk_a_top'], function () {
    Route::get('/', 'DkAController_Top');
});

Route::group(['namespace' => 'App\Http\Controllers\MGK\H1\A', 'prefix' => 'H1a'], function () {
    Route::get('/table', 'table_Controller');
    Route::get('/pressure', 'PressureController');
    Route::get('/zvi', 'zviController');
    Route::get('/xvi', 'xviController');
    Route::get('/ti', 'tiController');
});


Route::group(['namespace' => 'App\Http\Controllers\MGK\H1\B', 'prefix' => 'H1b'], function () {
    Route::get('/table', 'Table_Controller');
    Route::get('/pressure', 'PressureController');
    Route::get('/zvi', 'zviController');
    Route::get('/xvi', 'xviController');
    Route::get('/ti', 'tiController');
    Route::get('/data', 'DataLoadController');
});

// Варианты одиаковыхе для маршрутов
Route::group(['namespace' => 'App\Http\Controllers\MGK\H1', 'prefix' => 'H1'], function () {
    Route::get('/all', 'H1A_Controller@all');
    Route::get('/show/{id}', 'H1A_Controller@show');
});


Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/param', 'Test_Controller@filter_id');
    Route::get('/testR', 'Test_Controller@testRequest');
    Route::get('/load', 'LoadData_Controller@loadRequest');
    Route::get('/loadOne', 'LoadData_Controller@OneRequest');
});


//! Маршруты для тестов
Route::get('/api_test', [\App\Http\Controllers\API_Controller::class, 'index']);
// Route::resources([
//     'api_test' => \App\Http\Controllers\API_Controller::class,
// ]);
