<?php

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

// запросы для интерфейса прилажения
Route::group(['namespace'=>'App\Http\Controllers\WebInterface\Complex', 'prefix'=>'interface'], function (){
    Route::get('/complex', 'IndexController');
});

Route::group(['namespace'=>'App\Http\Controllers\WebInterface\Plant', 'prefix'=>'interface'], function (){
    Route::get('/plant', 'IndexController');
    Route::get('/plant/{complex_id}', 'PlantController');
});

Route::group(['namespace'=>'App\Http\Controllers\WebInterface\Unit', 'prefix'=>'interface'], function (){
    Route::get('/unit', 'IndexController');
    Route::get('/unit/{plant_id}', 'UnitController');
});

// роуты для содержимого прилажения
Route::group(['namespace'=>'App\Http\Controllers\DkA', 'prefix'=>'dk_a_data'], function (){
    Route::get('/', 'DkAController');

//    Route::post('/', 'StoreController');
//    Route::get('/', 'IndexController');
//    Route::get('/{person}', 'ShowController');
//    Route::patch('/{person}', 'UpdateController');
//    Route::delete('/{person}', 'DeleteController');
});

Route::group(['namespace'=>'App\Http\Controllers\DkA', 'prefix'=>'dk_a_json'], function (){
    Route::get('/', 'jsonController');

});

Route::group(['namespace'=>'App\Http\Controllers\DkA', 'prefix'=>'dk_a_top'], function (){
    Route::get('/', 'DkAController_Top');
});

Route::group(['namespace'=>'App\Http\Controllers\MGK\H1\A', 'prefix'=>'H1a'], function (){
    Route::get('/table', 'table_Controller');
    Route::get('/pressure', 'PressureController');
    Route::get('/zvi', 'zviController');
    Route::get('/xvi', 'xviController');
    Route::get('/ti', 'tiController');
});


Route::group(['namespace'=>'App\Http\Controllers\MGK\H1\B', 'prefix'=>'H1b'], function (){
    Route::get('/table', 'H1B_Table_Controller');
});

Route::group(['namespace'=>'App\Http\Controllers\MGK\H1\B', 'prefix'=>'H1b'], function (){
    Route::get('/tableOne', 'Table_Controller');
});
