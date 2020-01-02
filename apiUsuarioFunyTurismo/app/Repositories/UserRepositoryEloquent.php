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

    public function detalhesUsusario(int $id){
        return $this->user->find($id);
    }

    public function editarUsuario(int $id, Request $request){

        return $this->user->where('id', $id)->update($request->all());
    }

    public function deletarUsuario(int $id){
        $user = $this->user->find($id);
        return $user->delete();
    }

    public function comprarPacote(int $id ,int $idPacote){
       // return $this->where('id',$id)
    }

    public function login(Request $request)
    {
        return $request->only(['email', 'password']);
    }
}