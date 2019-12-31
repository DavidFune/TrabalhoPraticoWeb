<?php

namespace App\Repositories;
use Illuminate\Http\Request;
dd('test');

interface UserRepositoryInterface{
    public function registrarUsuario(Request $request);

}