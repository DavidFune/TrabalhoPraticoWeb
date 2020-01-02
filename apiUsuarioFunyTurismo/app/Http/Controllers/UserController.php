<?php
namespace App\Http\Controllers;
use App\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller{

    private $userService;

    public function __construct(UserService $userService){
        return $this->userService = $userService;
    }

    public function registrarUsuario(Request $resquest){
        return $this->userService->registrarUsuario($resquest);
    }

    public function login(Request $request){
        return $this->userService->login($request);
    }

    public function detalhesUsusario(int $id){
        return $this->userService->detalhesUsusario($id);
    }

    public function editarUsuario(int $id, Request $request){
        $this->userService->editarUsuario($id, $request);
    }

    public function deletarUsuario(int $id){
        $this->userService->deletarUsusario($id);
    }
    public function comprarPacote(int $idPacote){
        return $this->userService->comprarPacote($idPacote);
    }
}