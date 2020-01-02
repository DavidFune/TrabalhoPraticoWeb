<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix' => 'api'], function () use ($router) {
    // Matches "/api/register
    $router->post('registrar', 'UserController@registrarUsuario');
    $router->post('login', 'UserController@login');
    $router->put('{email}/editar', 'UserController@editarUsuario');
    $router->get('{email}/detalhes', 'UserController@detalhesUsuario');
    $router->get('{email}/excluir', 'UserController@deletarUsuario');

 
 });