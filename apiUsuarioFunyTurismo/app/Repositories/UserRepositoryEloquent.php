<?php

namespace App\Repositories;
use App\User;
use App\Models\Pacote;
use App\Models\User_Pacote;
//use App\UserPacote;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRepositoryEloquent 
//implements UserRepositoryInterface
{
    private $user;
    private $pacote;

    public function __construct(User $user,
     User_Pacote $pacote){
        $this->user = $user;
        $this->pacote = $pacote;
    }

    public function registrarUsuario(Request $request){
        

        $this->user->name = $request->input('name');
        $this->user->email = $request->input('email');
        $this->user->api_token = $request->input('api_token');
        //$this->user->idPacote = $request->input('idPacote');
        $plainPassword = $request->input('password');
        $this->user->password = app('hash')->make($plainPassword);
        $this->user->save();
        
        return $this->user;
    }

    public function detalhesUsusario(int $id){
        //dd(Auth::user()->id);
        return $this->user->find($id);
    }

    public function editarUsuario(int $id, Request $request){

        return $this->user->where('id', $id)->update($request->all());
    }

    public function deletarUsuario(int $id){
        $user = $this->user->find($id);
        return $user->delete();
    }

    public function comprarPacote(Request $request){
        $this->pacote->id_user = Auth::user()->id;
        $this->pacote->id_pacote = $request->input('id_pacote');
        $this->pacote->save();
        return $this->pacote;
    }

    public function meusPacotes(){
        $id_pacotes = User_Pacote::where('id_user',
        Auth::user()->id)->get('id_pacote');
         $pacotes = array();
        foreach ($id_pacotes as $id_pacote) {
           array_push($pacotes,Pacote::where('id',$id_pacote->id_pacote)->get());
        }
        return $pacotes;
     }

    public function login(Request $request)
    {
        return $request->only(['email', 'password']);
    }
}