<?php

namespace App\Repositories;
use App\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserRepositoryEloquent 
//implements UserRepositoryInterface
{
    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function registrarUsuario(Request $request){
        

        $this->user->name = $request->input('name');
        $this->user->email = $request->input('email');
        $this->user->idPacote = $request->input('idPacote');
        $plainPassword = $request->input('password');
        $this->user->password = app('hash')->make($plainPassword);
        $this->user->save();
        
        return $this->user;
    }

    public function login(Request $request){
        $this->user->login($request);
    }

}