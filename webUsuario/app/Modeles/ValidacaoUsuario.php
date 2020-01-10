<?php

namespace App\Modeles;

use Illuminate\Database\Eloquent\Model;

class ValidacaoUsuario extends Model
{
    public const MENSAGENS_DE_ERRO = [
        'required'  => 'O campo :atribute é obrigatorio',
        'email'     => 'Este email já existe, informe outro',
        'confirmed' => 'Insira uma senha'
       ];
 
    public const REGRA_NOVO_USUARIO = [
        'name'       => 'required | max:80',
        'email'      => 'required | email | unique:users',
        'password'   => 'required | confirmed',
    ];
}
