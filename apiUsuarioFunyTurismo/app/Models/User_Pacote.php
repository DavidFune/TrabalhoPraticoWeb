<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User_Pacote extends Model{
   
    protected $table = 'user_pacotes';

    protected $fillable = [
        'id_user','id_pacote'
    ];
}
