<?php
namespace App\Http\Controllers;
use App\User;
use App\Models\Pacote;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller{
    private $userService;

    public function __construct(UserService $userService){
        $this->middleware('auth');
        return $this->userService = $userService;
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

    public function comprarPacote(Request $request){
        return $this->userService->comprarPacote($request);
    }

    public function meusPacotes(){
        return $this->userService->meusPacotes();
    }
}