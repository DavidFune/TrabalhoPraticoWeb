<?php

namespace App\Http\Controllers;

use App\Pacote;
use Illuminate\Http\Request;
use App\Services\UserService;

class PacoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $userService;
     private $token;
     public function __construct(UserService $userService){
         return $this->userService = $userService;
     }
     
    public function home(){
        
        return view('principal.home');
    }

    public function login(){
        return view('principal.login');
    }

    public function logar(Request $request){
        $this->token = $this->userService->login($request);
        dd($this->token);
        return redirect('pacotes');
    }


    public function index()
    {
        $pacotes = $this->userService->getPacotes();
        $pacotes = $pacotes['dados'];
        return view('principal.index')
        ->with('pacotes',$pacotes);
    }
    public function detalhePacote(int $id){
        $pacote = $this->userService->getPacote($id);
        $pacote = $pacote['dados'][0];
        return view('detalhe')->with('pacote',$pacote);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pacote  $pacote
     * @return \Illuminate\Http\Response
     */
    public function show(Pacote $pacote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pacote  $pacote
     * @return \Illuminate\Http\Response
     */
    public function edit(Pacote $pacote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pacote  $pacote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pacote $pacote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pacote  $pacote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pacote $pacote)
    {
        //
    }
}
