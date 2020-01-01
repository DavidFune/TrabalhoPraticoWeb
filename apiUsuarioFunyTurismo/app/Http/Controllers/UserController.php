<?php
namespace App\Http\Controllers;
use App\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller{

    private $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function registrarUsuario(Request $resquest){
        $this->userService->registrarUsuario($resquest);
    }

    public function login(Request $request){
        $this->userService->login($request);
    }
}