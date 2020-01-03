<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Support\Facades\Auth;
use App\Models\Pacote;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model implements AuthenticatableContract,
 AuthorizableContract, JWTSubject
{
      use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','api_token'
        //,'idPacote'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

 
    public function pacotes()
    {
        return $this->belongsToMany('App\Models\Pacote', 'user_pacotes', 'id_user', 'id_pacote');
    }

    public function addPacote(Pacote $pacote){
        //dd(Auth::user()->id);
       // dd($this->pacotes());
        return $this->pacotes()->save($pacote);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
