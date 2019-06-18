<?php
namespace App\Services;
use Illuminate\Http\Request;
use App\Repositories\PacoteRepositoryInterface;
    /* como não se intancia uma interface ha nessecida de dizer a aplicação
    que quando for usar a PacoteRepositoryInterface vamos dizer que estamos usando
    PacoteRepositoryEloquent que a implementa, isso é feito em 
    Providers/AppServiceProvider no metodo public function register()
    toda essa tecnica é para melhorar a arquitetura da aplicação para ser 
    idependente de fonte de dados app.php e preciso descomentar a linha 79*/

class PacoteService{
   private $pacoteRepository;

   public function __construct(PacoteRepositoryInterface $pacoteRepository){
       $this->pacoteRepository = $pacoteRepository;
   }

   public function buscarTodosPacotes(){

       $pacote = $this->pacoteRepository->buscarTodosPacotes();
       if(count($pacote)>0){
           return $pacote;
       }else {
           return array();
       }   
   }

   public function buscarPacote($id){

    return $this->pacoteRepository->buscarPacote($id);  
    }

    public function criarPacote(Request $request){
        return $this->pacoteRepository->criarPacote($request);
    }

    public function editarPacote(int $id, Request $request){
        return $this->pacoteRepository->editarPacote($id, $request);
    }
    public function excluirPacote(int $id){
        return $this->pacoteRepository->excluirPacote($id);
    }
}
