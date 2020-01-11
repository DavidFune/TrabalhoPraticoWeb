<?php
namespace App\Http\Controllers;
use App\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{

    private $userService;

    public function __construct(UserService $userService){
        return $this->userService = $userService;
    }

    public function registrarUsuario(Request $request){
        dd($request);
        return $this->userService->registrarUsuario($request);
    }

    public function login(Request $request){
        return $this->userService->login($request);
    }
}