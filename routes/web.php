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

Route::group(['prefix' => 'complex', 'namespace' => 'App\Http\Controllers\Complex'], function () {
    Route::get('/', 'ComplexController@index')->name('complex.index');
    Route::get('/create', 'ComplexController@create')->name('complex.create');
    Route::post('/', 'ComplexController@store')->name('complex.store');
    Route::get('/{complex}/edit', 'ComplexController@edit')->name('complex.edit');
    Route::get('/{complex}', 'ComplexController@show')->name('complex.show');
    Route::patch('/{complex}', 'ComplexController@update')->name('complex.update');
    Route::delete('/{complex}', 'ComplexController@delete')->name('complex.delete');
});


Route::group(['namespace' => 'App\Http\Controllers\MGK\H1\B'], function () {
    Route::get('/table', 'Table_Controller')->name('home');
});



Route::get('/load', [App\Http\Controllers\LoadData_Controller::class, 'loadRequest']);

Route::get('/test', [App\Http\Controllers\Test_Controller::class, 'testRequest']);

Route::get('/', function () {
    return view('welcome');
})->name('main');



//Роуты для работы с таблицей комплексов
// Route::group(['namespace' => 'App\Http\Controllers'], function () {
//     Route::get('/complex/create', 'TbComplexController')->name('create');
// });

//Route::get('/complex/index', [App\Http\Controllers\TbComplexController::class, 'index']);
Route::get('/complexx/create', [App\Http\Controllers\TbComplexController::class, 'create']);
Route::get('/complexx/destroy', [App\Http\Controllers\TbComplexController::class, 'destroy']);

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
