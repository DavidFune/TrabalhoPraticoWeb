<?php
namespace App\Repositories;
 use App\Models\Pacote;
 use App\Repositories\PacoRepositoryInterface;
 //essa é a classe responśvel pela requisiçãos 
 use Illuminate\Http\Request;

 //classe responsável por implentar todas a consultas ao banco
 class PacoteRepositoryEloquent implements PacoteRepositoryInterface{
     private $pacote;
     //o proprio fremework faz a instacia de Pacote como objeto
     //no metodo
     public function __construct(Pacote $pacote){
         $this->pacote = $pacote;
     }

     public function buscarTodosPacotes() 
     {
         return $this->pacote
         ->select(
             'id',
             'nome',
             'valor',
             'dataInicio',
             'dataFim',
             'urlImagem',
             'descricao'
         )->get();
     }

    public function buscarPacote(int $id) 
    {     
        return $this->pacote->find($id);
        /* return $this->pacote
        ->select(
            'id',
            'nome',
            'valor',
            'dataInicio',
            'dataFim',
            'urlImagem',
            'descricao'
        )
        ->where('id',$id)
        ->get(); */
    }
 
    public function buscarDetalhePacote(int $id) 
    {
        // o metodo find trás todo os dados de um $id
        return $this->pacote->find($id);      
    }
 
    public function criarPacote(Request $request) 
    {        
        return $this->pacote->create($request->all());
    }
 
    public function editarPacote(int $id, Request $request) 
    {        
        // trás as informações de um pacote e update atualiza a informação
        // where trás a informações e update atualiza
        
        return $this->pacote
        ->where('id', $id)
        ->update($request->all());
    }
 
    public function excluirPacote(int $id)
    {
        $pacote = $this->pacote->find($id);
        return $pacote->delete();
    }
 }
 