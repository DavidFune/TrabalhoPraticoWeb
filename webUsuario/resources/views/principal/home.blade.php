<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('arquivos/bootstrap-4.3.1-dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('arquivos/bootstrap-4.3.1-dist/css/album.css')}}" rel="stylesheet">
    <link href="{{asset('css/home.css')}}" rel="stylesheet">
    
    <title>Funy Turismo</title>
</head>
<body>
    <nav class="navbar navbar-collapse bg-light">
        <a class="navbar-brand" href="/pacotes">
            <i class="material-icons">card_travel</i>
            Pacotes
        </a>
        <h4 class="font-weight-bolder">Funy Turismo</h4>
        <ul>
            <a class="" href="/login" style="float: right;">
                <i class="material-icons">fingerprint</i>
                Login
            </a>
        
            <a class="" href="#">
                <i class="material-icons">check_box</i>
                Cadastrar
            </a>
        </ul>
        
      </nav>
      @section('main')  
        <div class="main">
            <div class="container">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" >
                      <div class="carousel-item active"  >
                      <img class="d-block w-100" src="{{asset('storage/images/img01.jpg')}}"   alt="Primeiro Slide">
                      <div class="carousel-caption d-none d-md-block">
                        <h2 class="texCorucel">Venha conecer nossa agência Funy Turismo</h2>
                        <p class="texCorucel">...</p>
                      </div>
                      </div>
                  
                      <div class="carousel-item">
                        <img class="d-block w-100" src="{{asset('storage/images/img02.jpg')}}"   alt="Segundo Slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h3 class="texCorucel">Cinco dias em Fernando de Noronha</h3>
                            <p class="texCorucel">Café da manhã, almoço e passeio de barco</p>
                      </div>
                      </div>
                  
                      <div class="carousel-item">
                        <img class="d-block w-100" src="{{asset('storage/images/img03.jpg')}}"   alt="Terceiro Slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h3 class="texCorucel">Cinco dias em Capitolio</h3>
                            <p class="texCorucel">Café da manhã, almoço e passeio de barco</p>
                      </div>
                      </div>
                  
                    </div>
                  </div>      
            </div>
         </div>
        @show
 <footer class="text-muted">   
    <div class="container">
        <p class="float-right">
            <a href="#">Voltar ao topo</a>
        </p>
        <p>Funy Turismo &copy; Uma empresa des 2000</p>
    </div>
</footer>
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
    
</body>
</html>