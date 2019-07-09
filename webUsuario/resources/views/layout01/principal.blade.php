<!doctype html>
<html lang="br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="David, Fabio" content="">

    <title>Funy Turismo @yield('titolo')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('arquivos/bootstrap-4.3.1-dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
<link href="{{asset('arqivos/bootstrap-4.3.1-dist/css/album.css')}}" rel="stylesheet">
</head>

<body>

    <header>  
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-5 py-4">
                        <h4 class="text-white">Funy Truismo</h4>
                        <p class="text-muted">Uma agência de turismo que pensa na praticidade
                            e o conforto, de estar com seu destino nas palmas da mão!!! </p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Contatos</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Instagram</a></li>
                            <li><a href="#" class="text-white">Facebook</a></li>
                            <li><a href="#" class="text-white">Email</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-2 md-1 py-4">
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Login</a></li>
                            <li><a href="#" class="text-white">Cadastrar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
                <a href="/" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="mr-2">

                        <circle cx="12" cy="13" r="4"></circle>
                    </svg>
                    <strong>Home</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>


    
    <main role="main">
        
        
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Pacotes de Turismo</h1>
                <form class="form-inline">
                    <input class="form-control" style="min-width:40%;padding-right:72%;" type="search"
                        placeholder="Pesquisar" aria-label="Search">
                    <button class="btn btn-outline-success my-3 my-sm-0" type="submit">Pesquisar</button>
                </form>
            </div>
        </section>
        @yield('conteudo')
    </main>


    <footer class="text-muted">
        @section('footer')
            
        <div class="container">
            <p class="float-right">
                <a href="#">Voltar ao topo</a>
            </p>
            <p>Funy Turismo &copy; Uma empresa des 2000</p>
        </div>
    </footer>
    @endsection

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="{{asset('arquivos/bootstrap-4.3.1-dist/js/popper.min.js')}}"></script>
    <script src="{{asset('arquivos/bootstrap-4.3.1-dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('arquivos/bootstrap-4.3.1-dist/js/holder.min.js')}}"></script>
    

</html>