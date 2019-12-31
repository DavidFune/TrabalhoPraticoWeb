<?php
namespace App\Models;

class ValidacaoUsuario{

    public const MENSAGENS_DE_ERRO = [
        'required'    => 'O campo :atribute é obrigatorio',
       ];
 
    public const REGRA_NOVO_USUARIO = [
        'nome'       => 'required | max:80',
        'email' => 'required | string',
        'password' => 'required | string',
    ];
}