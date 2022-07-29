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

Route::GET('/', function () {
    return view('welcome');
});

Auth::routes();

Route::GET('/home', 'Colaboradores_Controller@index');
Route::resource('/colaboradores', 'Colaboradores_Controller');
Route::POST('/colaboradores/altera_salario', 'Colaboradores_Controller@altera_salario');
