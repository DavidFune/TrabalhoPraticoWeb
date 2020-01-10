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

Route::get('/','PacoteController@home');
Route::get('/login','PacoteController@login');
Route::post('/logar','PacoteController@logar');
Route::get('/pacotes','PacoteController@index');
Route::get('/pacote/detalhe/{id}','PacoteController@detalhePacote');
