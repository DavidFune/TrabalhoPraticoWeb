<?php

namespace App\Services;

use App\Models\ValidacaoPacote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Modeles\ ValidacaoLogin;
use App\Modeles\ ValidacaoUsuario;

class UserService{
    private $api;

    //criando uma instancia da classe ApiService
    public function __construct(){
        $this->api = new ApiService();

    }

    public function cadastrar(Request $request){
        
        $request->flash();

        Validator::make(
            $request->all(),
            ValidacaoUsuario::REGRA_NOVO_PACOTE,
            ValidacaoUsuario::MENSAGENS_DE_ERRO
        )->validate();

        $parametros = $request->all();

        return $this->api->POST('registrar', $parametros);

    }

    public function login(Request $request){
        $request->flash();

        Validator::make(
            $request->all(),
            ValidacaoLogin::REGRA_NOVO_USUARIO,
            ValidacaoLogin::MENSAGENS_DE_ERRO
        )->validate();

        $parametros = $request->except('_token');

        return $this->api->POST('login', $request->except('_token'));
    }

    public function editar(Request $request){

        $request->flash();

        Validator::make(
            $request->all(),
            ValidacaoUsuario::REGRA_NOVO_PACOTE,
            ValidacaoUsuario::MENSAGENS_DE_ERRO
        )->validate();

        $parametros = $request->except('_token');

        return $this->api->PUT($request->input('id').'/editar',$parametros);
    }

    public function deletar($id){
        return $this->api->DELETE($id.'/excluir');
    }

    public function getPacotes(){
        return $this->api->GETP('pacotes');
    }

    public function getPacote($id){
        return $this->api->GETP('pacote/'.$id);
    }

    public function comprar(Request $request){

        $request->flash();

        $parametros = $request->all();

        return $this->api->POST('comprar',$parametros);
    }

    public function meusPacotes(){
        
    }
}