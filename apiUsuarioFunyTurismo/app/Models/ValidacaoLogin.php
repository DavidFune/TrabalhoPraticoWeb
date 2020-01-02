<?php
namespace App\Models;

class ValidacaoLogin{

    public const MENSAGENS_DE_ERRO = [
        'required'  => 'Insira uma senha',
        'email'     => 'Insira um email',
       ];
 
    public const REGRA_NOVO_USUARIO = [
        'email'      => 'required | email',
        'password'   => 'required | ',
    ];
}