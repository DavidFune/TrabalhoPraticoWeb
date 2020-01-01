<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Repositories\UserRepositoryEloquent;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use App\Models\ValidacaoUsuario;
use Illuminate\Support\Facades\Auth;
use app\User;

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

    public function login(Request $request)
    {

        $credentials = $request->only(['email', 'password']);

        //dd($credentials);

        if (! $token = Auth::attempt($credentials)) {
            //return
             print (response()->json(['message' => 'Unauthorized'], 401));
        }

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        
        print( response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ], 200));
    }
}
