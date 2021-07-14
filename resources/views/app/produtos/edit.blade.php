@extends('app.layouts.basico')

@section('title', 'Produto')

@section('conteudo')
<div class="container">
  <div class="text-center aligne-middle p-3 mb-2" style="color: white; background-color: rgb(84, 84, 230);">
    <p>Produto - Cadastrar</p>
  </div>

  @component('app.produtos.nav_produto')
  @endcomponent

  <div class="mx-auto row">
    <div class="col-6 col-md-4"></div>
    <div class="col-sm-4 ">
      @if (isset($_GET['message_success']))
      <div class="alert alert-success" role="alert">
        {{$_GET['message_success']}}
      </div>
      @endif
      <form method="post" action="{{route('produto.update', ['produto' => $produto])}}">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="{{$produto['id'] ?? ''}}">

        <input type="text" name="nome" class="mb-2 border border-dark" placeholder="Nome"
          value="{{$produto['nome'] ?? old('nome')}}">
        @if($errors->has('nome'))
        <div class="alert-danger rounded p-1 ">
          {{$errors->first('nome')}}
        </div>
        @endif
        <br>

        <input type="text" name="descricao" class="mb-2 border border-dark" placeholder="Descrição"
          value="{{$produto['descricao'] ?? old('descricao')}}">
        @if($errors->has('descricao'))
        <div class="alert-danger rounded p-1 ">
          {{$errors->first('descricao')}}
        </div>
        @endif
        <br>

        <input type="number" name="peso" class="mb-2 border border-dark" placeholder="Peso"
          value="{{$produto['peso'] ?? old('peso')}}">
        @if($errors->has('peso'))
        <div class="alert-danger rounded p-1 ">
          {{$errors->first('peso')}}
        </div>
        @endif
        <br>

        <select class="mb-2 border border-dark" name="fornecedor_id" id="">
            <option value="">-- Selecione o Fornecedor --</option>
            @foreach ($fornecedores as $fornecedor)
                <option value="{{$fornecedor->id}}" {{ ($produto->fornecedor_id ??old('fornecedor_id')) == $fornecedor->id ? 'selected' : ''}}>{{$fornecedor->nome}}</option>
            @endforeach
        </select>
        @if($errors->has('fornecedor_id'))
        <div class="alert-danger rounded p-1 ">
          {{$errors->first('fornecedor_id')}}
        </div>
        @endif
        <br>

        <select class="mb-2 border border-dark" name="unidade_id" id="">
            <option value="">-- Selecione a Unidade de Medida --</option>
            @foreach ($unidades as $unidade)
                <option value="{{$unidade['id']}}"  {{ ($produto['unidade_id'] ?? old('unidade_id')) == $unidade['id'] ? 'selected' : ''}}>{{$unidade['descricao']}}</option>
            @endforeach
        </select>
        @if($errors->has('unidade_id'))
        <div class="alert-danger rounded p-1 ">
          {{$errors->first('unidade_id')}}
        </div>
        @endif
        <br>


        <button type="submit" class="btn btn-outline-primary">Editar</button>


      </form>
    </div>
    <div class="col-6 col-md-4"></div>
  </div>
</div>

@endsection
