<?php
namespace App\Services;
use Illuminate\Http\Request;
use App\Repositories\PacoteRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use App\Models\ValidacaoPacote;

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

 /*       $pacote = $this->pacoteRepository->buscarTodosPacotes();
       if(count($pacote)>0){
           //return $pacote;
            return response()->json($pacote, Response::HTTP_OK);
       }else {
           //return array();
           return response()->json([], Response::HTTP_OK);

       }   */ 
       try {
        $pacotes = $this->pacoteRepository->buscarTodosPacotes();
 
        if (count($pacotes) > 0) {
            return response()->json($pacotes, Response::HTTP_OK);                
        } else {
            return response()->json([], Response::HTTP_OK);          
        } 
    } catch(QueryException $e) {
        return response()->json(['erro'=> 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
   }

   public function buscarPacote($id){

        //return $this->pacoteRepository->buscarPacote($id);  
        try {
            $pacote = $this->pacoteRepository->buscarPacote($id);

            if (count($pacote) > 0) {
                return response()->json($pacote, Response::HTTP_OK);          
            } else {
                return response()->json(null, Response::HTTP_NOT_FOUND);
            }       
        } catch(QueryException $e) {
            return response()->json(['erro'=> 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function criarPacote(Request $request){
           // return $this->pacoteRepository->criarPacote($request);
           $validacao = Validator::make(
            $request->all(),
            ValidacaoPacote::REGRA_NOVO_PACOTE,
            ValidacaoPacote::MENSAGENS_DE_ERRO              
        );

        if($validacao->fails()) {
            return response()->json($validacao->errors(), Response::HTTP_BAD_REQUEST); 
        } else {
            try {
                $pacote = $this->pacoteRepository->criarPacote($request);
                return response()->json($pacote, Response::HTTP_CREATED);
            } catch(QueryException $e) {
                return response()->json(['erro'=> 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }  
    }

    public function editarPacote(int $id, Request $request){
        //return $this->pacoteRepository->editarPacote($id, $request);
        $validacao = Validator::make(
            $request->all(),
            ValidacaoPacote::REGRA_NOVO_PACOTE,
            ValidacaoPacote::MENSAGENS_DE_ERRO              
        );
 
        if($validacao->fails()) {
            return response()->json($validacao->errors(), Response::HTTP_BAD_REQUEST); 
        } else {
            try {
                $pacote = $this->pacoteRepository->editarPacote($id, $request);            
                return response()->json($pacote, Response::HTTP_OK);
            } catch(QueryException $e) {
                return response()->json(['erro'=> 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }
    public function excluirPacote(int $id){
        //return $this->pacoteRepository->excluirPacote($id);
        try {
            $pacote = $this->pacoteRepository->excluirPacote($id);           
            return response()->json(null, Response::HTTP_OK);
        } catch(QueryException $e) {
            return response()->json(['erro'=> 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function buscarDetalhePacote($id)
    {
        try {
            $pacote = $this->pacoteRepository->buscarDetalhePacote($id);
         
            if (is_null($pacote)) {
                return response()->json([], Response::HTTP_NOT_FOUND);
            } else {
                return response()->json([
                    'id'          => $pacote->id,
                    'descricao'   => $pacote->descricao,
                    'urlImagem'   => $pacote->urlImagem,
                    'telefone'    => $pacote->telefone,
                    'pacote'      => [
                        'id'         => $pacote->id,
                        'nome'       => $pacote->nome,
                        'dataInicio' => $pacote->dataInicio,
                        'dataFim'    => $pacote->dataFim,
                        'valor'      => $pacote->valor
                    ]
                ], Response::HTTP_OK);  
            }
        } catch(QueryException $e) {
            return response()->json(['erro'=> 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }        
    }
}
