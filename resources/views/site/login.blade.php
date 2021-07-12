@extends('site.layouts.base')

@section('title', 'Login')

@section('conteudo')

<div class="conteudo-pagina container-fluid">
  <div class="titulo-pagina">
    <h1>Login</h1>
  </div>

  <form class="row needs-validation mb-3 w-50 mx-auto" method="post" action="{{route('site.login')}}">
    <div class="col-md">


      @csrf

      <div class="informacao-pagina">

        <div class="form-floating mb-2">
          <input name="email" type="text" class="form-control" id="floatingInputGrid" placeholder="E-mail"
            value="{{old('email')}}">
          <label for="floatingInputGrid">E-mail</label>
        </div>
        @if($errors->has('email'))
        <div class="alert-danger my-1 rounded p-1 ">
          {{$errors->first('email')}}
        </div>
        @endif

        <div class="form-floating mb-2">
          <input name="senha" type="password" class="form-control" id="floatingInputGrid" placeholder="Senha"
            value="{{old('senha')}}">
          <label for="floatingInputGrid">Senha</label>
        </div>
        @if($errors->has('senha'))
        <div class="alert-danger my-1 rounded p-1 ">
          {{$errors->first('senha')}}
        </div>
        @endif

      </div>
      @if(isset($erro) && $erro == 1)
      <div class="alert-danger my-1 rounded p-1 ">
        E-mail ou senha inválidos, tente novamnete
      </div>
      @endif

      @if(isset($erro) && $erro == 2)
      <div class="alert-danger my-1 rounded p-1 ">
        Necessário realizar login para ter acesso á página
      </div>
      @endif

      <div class="mt-2">
        <button type="submit" class="btn btn-primary text-white btn-lg">Login</button>
      </div>
    </div>

  </form>
</div>

<div class="rodape">
  <div class="redes-sociais">
    <h2>Redes sociais</h2>
    <img src="{{asset('img/facebook.png')}}">
    <img src="{{asset('img/linkedin.png')}}">
    <img src="{{asset('img/youtube.png')}}">
  </div>
  <div class="area-contato">
    <h2>Contato</h2>
    <span>(11) 3333-4444</span>
    <br>
    <span>supergestao@dominio.com.br</span>
  </div>
  <div class="localizacao">
    <h2>Localização</h2>
    <img src="{{asset('img/mapa.png')}}">
  </div>

</div>
@endsection