<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Repositories\UserRepositoryEloquent;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use App\Models\ValidacaoUsuario;
use App\Models\ValidacaoLogin;
use App\Models\Pacote;
use Illuminate\Support\Facades\Auth;

class UserService{
    
    private $userRepository;
    private $pacote;
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
                 return response()->json(['erro'=> $e], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
     
    }

    public function detalhesUsusario(int $id){

        try{
            $user = $this->userRepository->detalhesUsusario($id);
            return response()->json([
                'nome' => $user->name,
                'email'=> $user->email
            ], Response::HTTP_OK);
        } catch(QueryException $e){
            
            return response()->json(['erro'=> 'Erro de conexão com o banco'],
             Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function editarUsuario(int $id, Request $request){

        $validacao = Validator::make(
            $request->all(),
            ValidacaoPacote::REGRA_NOVO_PACOTE,
            ValidacaoPacote::MENSAGENS_DE_ERRO              
        );
 
        if($validacao->fails()) {
            return response()->json($validacao->errors(), Response::HTTP_BAD_REQUEST); 
        } else {
            try {
                $user = $this->userRepository->editarUsuario($id, $request);            
                return response()->json($user, Response::HTTP_OK);
            } catch(QueryException $e) {
                return response()->json(['erro'=> 'Erro de conexão com o banco']
                , Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }

    }

    public function deletarUsusario(int $id){

        try {
            $user = $this->userRepository->deletarUsuario($id);           
            return response()->json(null, Response::HTTP_OK);
        } catch(QueryException $e) {
            return response()->json(['erro'=> 'Erro de conexão com o banco'],
             Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }


    public function login(Request $request){

        $validacao = Validator::make(
            $request->all(),
            ValidacaoLogin::REGRA_NOVO_USUARIO,
            ValidacaoLogin::MENSAGENS_DE_ERRO
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

    public function comprarPacote(int $id){
        
        try {
            $pacote = $this->userRepository->comprarPacote($id);
            return response()->json($pacote, Response::HTTP_CREATED);
        } catch(QueryException $e) {
            //'Erro de conexão com o banco'
            return response()->json(['erro'=> $e]
            , Response::HTTP_INTERNAL_SERVER_ERROR);
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
