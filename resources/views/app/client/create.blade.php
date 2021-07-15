@extends('app.layouts.basico')

@section('title', 'Cliente')

@section('conteudo')
<div class="container">
  <div class="text-center aligne-middle p-3 mb-2" style="color: white; background-color: rgb(84, 84, 230);">
    <p>Cliente - Cadastrar</p>
  </div>

  @component('app.client.nav_client')
  @endcomponent

  <div class="mx-auto row">
    <div class="col-6 col-md-4"></div>
    <div class="col-sm-4 ">
      @if (isset($_GET['message_success']))
      <div class="alert alert-success" role="alert">
        {{$_GET['message_success']}}
      </div>
      @endif
      <form method="post" action="{{route('cliente.store')}}">
        @csrf

        <input type="hidden" name="id" value="{{$cliente['id'] ?? ''}}">

        <input type="text" name="nome" class="mb-2 border border-dark" placeholder="Nome"
          value="{{$cliente['nome'] ?? old('nome')}}">
        @if($errors->has('nome'))
        <div class="alert-danger rounded p-1 ">
          {{$errors->first('nome')}}
        </div>
        @endif
        <br>

        <button type="submit" class="btn btn-outline-primary">Adicionar</button>


      </form>
    </div>
    <div class="col-6 col-md-4"></div>
  </div>
</div>

@endsection
