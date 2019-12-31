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

        $this->user->create($request->all());

    }

}