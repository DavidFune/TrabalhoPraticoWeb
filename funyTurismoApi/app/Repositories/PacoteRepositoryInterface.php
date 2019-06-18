<?php
 
 namespace App\Repositories;
 
 use Illuminate\Http\Request;

 // interface que abtrai todos o metodos de consulta ao banco
 // essa interface é feita caso o banco mude será necessario apenas mudar 
 // o pacoterepositoreloquent, não mudando o controller do pacote
 interface PacoteRepositoryInterface 
 {
 	public function buscarTodosPacotes();
 	public function buscarPacote(int $id);
 	public function buscarDetalhePacote(int $id);
 	public function criarPacote(Request $request);
	public function editarPacote(int $id, Request $request);
	public function excluirPacote(int $id);
 }