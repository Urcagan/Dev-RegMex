<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', \App\Http\Controllers\Main\IndexController::class)-> name('main.index');

Route::group(['namespace' => 'App\Http\Controllers\MGK\H1\B'], function () {
    Route::get('/table', 'Table_Controller')->name('home');
});

Route::get('/load', [App\Http\Controllers\LoadData_Controller::class, 'loadRequest']);

Route::get('/test', [App\Http\Controllers\Test_Controller::class, 'testRequest']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/goods/create', [App\Http\Controllers\GoodsController::class, 'create']);


//Роуты для работы с таблицей комплексов
// Route::group(['namespace' => 'App\Http\Controllers'], function () {
//     Route::get('/complex/create', 'TbComplexController')->name('create');
// });

//Route::get('/complex/index', [App\Http\Controllers\TbComplexController::class, 'index']);
Route::get('/complex/create', [App\Http\Controllers\TbComplexController::class, 'create']);
Route::get('/complex/destroy', [App\Http\Controllers\TbComplexController::class, 'destroy']);

//Route::get('/{any}', function () {
//    return view('welcome');
//})->where('any','.*');

// Route::get('/clear', function() {
//    Artisan::call('cache:clear');
//    Artisan::call('config:cache');
//    Artisan::call('view:clear');
//    Artisan::call('route:clear');
//    Artisan::call('backup:clean');
//    return "Кэш очищен.";});

Route::get('/{pathMatch}', function () {
    return view('welcome');
})
    ->where('pathMatch', ".*");
