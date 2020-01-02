<?php

namespace App\Repositories;
use Illuminate\Http\Request;
dd('test');

interface UserRepositoryInterface{
    public function registrarUsuario(Request $request);
    public function detalhesUsusario(String $email);
    public function editarUsuario(String $email, Request $request);
    public function deletarUsusario(String $email);
    public function comprarPacote(int $idPacote);
}