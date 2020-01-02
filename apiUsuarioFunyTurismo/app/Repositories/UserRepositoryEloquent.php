<?php

namespace App\Repositories;
use App\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function detalhesUsusario(String $email){
        return $this->user->where($email)->get;
    }

    public function editarUsuario(String $email, Request $request){

        return $this->user->where('email', $email)->update($request->all());
    }

    public function deletarUsusario(String $email){
        $user = $this->user->find($email);
        return $user->delete();
    }

    public function login(Request $request)
    {

        return $request->only(['email', 'password']);

        //dd($credentials);
    }

}