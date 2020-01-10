@extends('layout01.principal')

@section('conteudo')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">            
            @foreach ($pacotes as $pacote)
            <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="{{ $pacote['urlImagem']}}" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text"> {{$pacote['descricao']}}

                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                    <a class="btn btn-sm btn-outline-secondary" href="/pacote/detalhe/{{$pacote['id']}}"
                                            role="button">Visualisar</a>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
            </div>
            @endforeach
        </div>
        </div>
    </div> 
@endsection
@show
