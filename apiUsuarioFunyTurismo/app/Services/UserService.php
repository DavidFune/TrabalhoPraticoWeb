<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Repositories\UserRepositoryEloquent;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use App\Models\ValidacaoUsuario;

class UserService{
    
    private $userRepository;
    public function __construct(UserRepositoryEloquent $userRepository){

        $this->userRepository = $userRepository;
    }

    public function registrarUsuario(Request $request){


        try {
            $user = $this->userRepository->registrarUsuario($request);
            //return
            print(response()->json($user, Response::HTTP_CREATED));
        } catch(QueryException $e) {
            //return
            print(response()->json(['erro'=> 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR));
        }

        /*
        $validacao = Validator::make(
            $request->all(),
            ValidacaoUsuario::REGRA_NOVO_USUARIO,
            ValidacaoUsuario::MENSAGENS_DE_ERRO
        );
        
        if($validacao->fails()) {
            print(response()->json($validacao->errors(), Response::HTTP_BAD_REQUEST)); 
        } else {

        }*/ 
    }
}
