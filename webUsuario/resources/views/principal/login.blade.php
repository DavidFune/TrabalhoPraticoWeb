@extends('principal.home')
@section('main')
<link href="{{asset('css/login.css')}}" rel="stylesheet">
<div class="main">
    <div class="content">
        <form class="form-signin" method="POST" action="/logar">
          {{ csrf_field() }}
          <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
          <label for="inputEmail" class="sr-only">Endereço de email</label>
          <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Seu email" required autofocus>
          <label for="inputPassword" class="sr-only">Senha</label>
          <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Senha" required>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Lembrar de mim
            </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
          
        </form>
    </div>
</div>
@endsection