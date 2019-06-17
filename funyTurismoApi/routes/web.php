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

//$router->get('/api/pacotes','PacoteController@buscarPacotes');

$router->get('/api/pacotes', 'PacoteController@buscarTodosPacotes');

$router->group(['prefix' => 'api/pacote'], function () use ($router) {	
    $router->get('', 'PacoteController@buscarPacote');
    $router->get('/detalhes', 'PacoteController@buscarDetalhePacote');
    $router->post('/','PacoteController@criarPacote'); 
    $router->put('','PacoteController@editarPacote');
    $router->delete('', 'PacoteController@excluirPacote'); 	
});
