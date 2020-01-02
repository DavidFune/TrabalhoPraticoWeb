<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Repositories\UserRepositoryEloquent;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use App\Models\ValidacaoUsuario;
use Illuminate\Support\Facades\Auth;

class UserService{
    
    private $userRepository;
    public function __construct(UserRepositoryEloquent $userRepository){

        $this->userRepository = $userRepository;
    }

    public function registrarUsuario(Request $request){


        $validacao = Validator::make(
            $request->all(),
            ValidacaoUsuario::REGRA_NOVO_USUARIO,
            ValidacaoUsuario::MENSAGENS_DE_ERRO
        );

        if($validacao->fails()) {
            return response()->json($validacao->errors(), Response::HTTP_BAD_REQUEST); 
        } else {

            try {
                $user = $this->userRepository->registrarUsuario($request);
                //return
                 return response()->json($user, Response::HTTP_CREATED);
            } catch(QueryException $e) {
                //return
                 return response()->json(['erro'=> 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
     
    }

    public function detalhesUsusario(String $email){

        try{
            $user = $this->user->detalhesUsusario($email);
            return response()->json([
                'nome' => $user->name,
                'email'=> $user->email
            ], Response::HTTP_OK);
        } catch(QueryException $e){
            
            return response()->json(['erro'=> 'Erro de conexão com o banco'],
             Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function editarUsuario(String $email, Request $request){

        $validacao = Validator::make(
            $request->all(),
            ValidacaoPacote::REGRA_NOVO_PACOTE,
            ValidacaoPacote::MENSAGENS_DE_ERRO              
        );
 
        if($validacao->fails()) {
            return response()->json($validacao->errors(), Response::HTTP_BAD_REQUEST); 
        } else {
            try {
                $user = $this->userRepository->editarUsuario($email, $request);            
                return response()->json($user, Response::HTTP_OK);
            } catch(QueryException $e) {
                return response()->json(['erro'=> 'Erro de conexão com o banco']
                , Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }

    }

    public function deletarUsusario(String $email){

        try {
            $user = $this->userRepository->excluirUsuario($email);           
            return response()->json(null, Response::HTTP_OK);
        } catch(QueryException $e) {
            return response()->json(['erro'=> 'Erro de conexão com o banco'],
             Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }


    public function login(Request $request){

        $validacao = Validator::make(
            $request->all(),
            ValidacaoUsuario::REGRA_NOVO_USUARIO,
            ValidacaoUsuario::MENSAGENS_DE_ERRO
        );



        if($validacao->fails()) {
            return response()->json($validacao->errors(), Response::HTTP_BAD_REQUEST); 
        } else {

            try {
                $credentials = $this->userRepository->login($request);

                if (! $token = Auth::attempt($credentials)) {
                    return response()->json(['message' => 'Usuário não autorizado'], 401);
                }
                
                return $this->respondWithToken($token);

                return response()->json($user, Response::HTTP_OK);
            } catch(QueryException $e) {
                return response()->json(['erro'=> 'Erro de conexão com o banco'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }


    protected function respondWithToken($token)
    {
        
        // return
        print( response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ], 200));
    }
}
