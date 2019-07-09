@extends('layout01.principal')


@section('conteudo')
<div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="{{$pacote->urlImagem}}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">{{$pacote->nome}}</p>
                        
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a class="btn btn-sm btn-outline-secondary" href="#"
                                    role="button">Comprar</a>
                            </div>
                        <small class="text-muted">R$:{{$pacote->valor}}</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <div class="card-body">
                            <p class="card-text">{{$pacote->descricao}}</p>
                           
                            <p class="card-text">Partida: {{date('d/m/Y',strtotime($pacote->dataInicio))}}</p>
                            <p class="card-text">Volta: {{date('d/m/Y',strtotime($pacote->dataFim))}}</p> 
                        </p>
                    </div>
                </div>
            </div>

        </div>
@endsection