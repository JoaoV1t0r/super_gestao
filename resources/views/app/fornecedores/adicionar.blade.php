@extends('app.layouts.basico')

@section('title', 'Fornecedor')

@section('conteudo')
<div class="container">
  <div class="text-center aligne-middle p-3 mb-2" style="color: white; background-color: rgb(84, 84, 230);">
    <p>Fornecedor - Adicionar</p>
  </div>

  @component('app.fornecedores.nav_fornecedor', ['function_form' => 'Adicionar'])
  @endcomponent

  <div class="mx-auto row">
    <div class="col-6 col-md-4"></div>
    <div class="col-sm-4 ">
      @if (isset($_GET['message_success']))
          <div class="alert alert-success" role="alert">
            {{$_GET['message_success']}}
          </div>
      @endif
      <form method="post" action="{{route('app.fornecedor.cadastrar')}}">
        @csrf

        <input type="hidden" name="id" value="{{$fornecedor['id'] ?? ''}}">

        <input type="text" name="nome" class="mb-2 border border-dark" placeholder="Nome" value="{{$fornecedor['nome'] ?? old('nome')}}">
        @if($errors->has('nome'))
          <div class="alert-danger rounded p-1 ">
            {{$errors->first('nome')}}
          </div>
        @endif
        <br>

        <input type="text" name="site" class="mb-2 border border-dark" placeholder="Site" value="{{$fornecedor['site'] ?? old('site')}}">
        @if($errors->has('site'))
          <div class="alert-danger rounded p-1 ">
            {{$errors->first('site')}}
          </div>
        @endif
        <br>

        <input type="text" name="uf" class="mb-2 border border-dark" placeholder="UF" value="{{$fornecedor['uf'] ?? old('uf')}}">
        @if($errors->has('uf'))
          <div class="alert-danger rounded p-1 ">
            {{$errors->first('uf')}}
          </div>
        @endif
        <br>

        <input type="email" name="email" class="mb-2 border border-dark" placeholder="E-mail" value="{{$fornecedor['email'] ?? old('email')}}">
        @if($errors->has('email'))
          <div class="alert-danger rounded p-1 ">
            {{$errors->first('email')}}
          </div>
        @endif
        <br>

        @if (isset($fornecedor))
            <button type="submit" class="btn btn-outline-primary">Editar</button>
        @else
            <button type="submit" class="btn btn-outline-primary">Adicionar</button>
        @endif

      </form>
    </div>
    <div class="col-6 col-md-4"></div>
  </div>
</div>

@endsection
