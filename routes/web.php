<?php

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
    return view('welcome');
});

Route::group(['middleware'=>'auth'],function(){
    //funcionario
    Route::group(['prefix'=>'funcionario','as'=>'funcionario.'],function(){
        Route::get('/cadastra','FuncionarioController@cadastra')->name('cadastra');
    });

    //departamento
    Route::group(['prefix'=>'departamento','as'=>'departamento.'],function(){
        Route::get('/cadastra','DepartamentoController@cadastra')->name('cadastra');
        Route::post('/cadastra','DepartamentoController@cadastraGuarda')->name('cadastraGuarda');
    });
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
