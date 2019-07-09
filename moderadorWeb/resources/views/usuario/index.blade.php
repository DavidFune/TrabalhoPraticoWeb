@extends('layouts.inicial')

@section('conteudo')
    <div class="album py-5 bg-light">
        <div class="container">
            @foreach ($pacotes['dados'] as $pacote)
            <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{$pacote['urlImagem']}}" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text"> {{$pacote['nome']}}

                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-outline-secondary" href="detalhePacote.html"
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
@endsection
