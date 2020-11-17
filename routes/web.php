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

Route::get('/', function () {
    return redirect('moduloThree');
});


Route::get('/moduloThreeRecords', 'App\Http\Controllers\ModuloThreeController@index');
Route::get('/moduloThree', 'App\Http\Controllers\ModuloThreeController@moduloThreeNew');
Route::post('/moduloThree', 'App\Http\Controllers\ModuloThreeController@moduloThreeCalculate');




//Route::get('/fsm', 'App\Http\Controllers\FiniteStateMachine@index');
Route::get('/fsm', 'App\Http\Controllers\FiniteStateMachineController@fsmNew');
Route::post('/fsm', 'App\Http\Controllers\FiniteStateMachineController@fsmCalculate');
