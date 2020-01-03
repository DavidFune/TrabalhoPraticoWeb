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
    $router->put('{id}/editar', 'UserAuthController@editarUsuario');
    $router->get('{id}/detalhes', 'UserAuthController@detalhesUsusario');
    $router->delete('{id}/excluir', 'UserAuthController@deletarUsuario');
    $router->post('{id}/comprar', 'UserAuthController@comprarPacote');
 });