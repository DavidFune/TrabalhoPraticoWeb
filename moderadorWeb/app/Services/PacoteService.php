<?php

namespace App\Services;

use App\Models\ValidacaoPacote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;
/* Utilizamos um recurso da classe Request que é o método flash. Esse método é responsável
 por salvar todos os dados na sessão, para que caso necessário, eles possam voltar para a 
 view que contém o formulário. Esse procedimento é muito comum em casos de validação, onde ao 
 enviar o formulário e houver algum erro de validação, os campos voltem para a correção do 
 usuário.
 */

class PacoteService{

    private $api;

    //criando uma instancia da classe ApiService
    public function __construct(){
        $this->api = new ApiService();
    }
    public function salvarPacote(Request $request){

        $request->flash();

        Validator::make(
            $request->all(),
            ValidacaoPacote::REGRA_NOVO_PACOTE,
            ValidacaoPacote::MENSAGENS_DE_ERRO
        )->validate();

        $parametros = $request->all();

        if ($request->hasFile('urlImagem')) {
            $imageService = new ImageService();
            $urlImagem = $imageService->salvarImagem($request->urlImagem);

            $parametros = array_merge(
                $parametros,
                array('urlImagem' => $urlImagem)
            );
        }

        return $this->api->POST('pacote', [
            'form_params' => $parametros
        ]);
    }




    public function bucarPacotes(){
        return $this->api->get('pacotes');
    }
    public function buscarPacote($id){
        return $this->api->get('pacote'.$id.'detalhes');
    }

    public function excluirPacote($id){
        return $this->api->DELETE('pacote/' . $id);
    }

    public function editarPacote(Request $request){
        $request->flash();

        Validator::make(
            $request->all(),
            ValidacaoPacote::REGRA_NOVO_PACOTE,
            ValidacaoPacote::MENSAGENS_DE_ERRO
        )->validate();

        $parametros = $request->except('_token');

        if ($request->hasFile('urlImagem')) {
            $imageService = new ImageService();
            $urlImagem = $imageService->salvarImagem($request->urlImagem);

            $parametros = array_merge(
                $parametros,
                array('urlImagem' => $urlImagem)
            );
        }
        return $this->api->PUT('pacote/' . $request->input('id'), [
            'form_params' => $parametros
        ]);
    }
}
