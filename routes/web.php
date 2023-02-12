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

Route::group(['namespace' => 'App\Http\Controllers\MGK\H1\B'], function () {
    Route::get('/table', 'Table_Controller')->name('home');
});

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/{any}', function () {
//    return view('welcome');
//})->where('any','.*');

//Route::get('/clear', function() {
//    Artisan::call('cache:clear');
//    Artisan::call('config:cache');
//    Artisan::call('view:clear');
//    Artisan::call('route:clear');
//    Artisan::call('backup:clean');
//    return "Кэш очищен.";});

Route::get('/{pathMatch}', function () {
    return view('welcome');})
    ->where('pathMatch', ".*");
