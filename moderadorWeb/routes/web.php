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
Route::get('/', function () {
    return view('welcome');
});
*/

 Route::get('/', 'PacoteController@home');
 Route::get('/usuario','PacoteController@homeUser');

Route::prefix('pacote')->group(function () {
    Route::get('cadastro', 'PacoteController@cadastro');
    Route::post('cadastro', 'PacoteController@salvarPacote');
    Route::get('edicao/{id}', 'PacoteController@descreverPacote');
    Route::post('edicao', 'PacoteController@editarPacote');
    Route::get('exclusao/{id}', 'PacoteController@confirmarExclusao');
    Route::post('exclusao', 'PacoteController@excluirPacote');
});