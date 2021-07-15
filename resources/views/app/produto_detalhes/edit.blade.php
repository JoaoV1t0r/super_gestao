@extends('app.layouts.basico')

@section('title', 'Produto')

@section('conteudo')
<div class="container">
  <div class="text-center aligne-middle p-3 mb-2" style="color: white; background-color: rgb(84, 84, 230);">
    <p>Produto Detalhes - Cadastrar</p>
  </div>

  @component('app.produto_detalhes.nav_produto')
  @endcomponent

  <div class="mx-auto row">
    <div class="col-6 col-md-4"></div>
    <div class="col-sm-4 ">
      @if (isset($_GET['message_success']))
      <div class="alert alert-success" role="alert">
        {{$_GET['message_success']}}
      </div>
      @endif
      <form method="post" action="{{route('produto_detalhes.update', ['produto_detalhe' =>$produto_detalhe])}}">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="{{$produto_detalhe['id'] ?? ''}}">

        <input type="number" name="produto_id" class="mb-2 border border-dark" placeholder="ID Produto"
          value="{{$produto_detalhe['produto_id'] ?? old('produto_id')}}">
        @if($errors->has('produto_id'))
        <div class="alert-danger rounded p-1 ">
          {{$errors->first('produto_id')}}
        </div>
        @endif
        <br>

        <input type="number" name="comprimento" class="mb-2 border border-dark" placeholder="Comprimento"
          value="{{$produto_detalhe['comprimento'] ?? old('comprimento')}}">
        @if($errors->has('comprimento'))
        <div class="alert-danger rounded p-1 ">
          {{$errors->first('comprimento')}}
        </div>
        @endif
        <br>

        <input type="number" name="largura" class="mb-2 border border-dark" placeholder="Largura"
          value="{{$produto_detalhe['largura'] ?? old('largura')}}">
        @if($errors->has('largura'))
        <div class="alert-danger rounded p-1 ">
          {{$errors->first('largura')}}
        </div>
        @endif
        <br>

        <input type="number" name="altura" class="mb-2 border border-dark" placeholder="Altura"
          value="{{$produto_detalhe['altura'] ?? old('altura')}}">
        @if($errors->has('altura'))
        <div class="alert-danger rounded p-1 ">
          {{$errors->first('altura')}}
        </div>
        @endif
        <br>

        <select class="mb-2 border border-dark" name="unidade_id" id="">
            <option value="">-- Selecione a Unidade de Medida --</option>
            @foreach ($unidades as $unidade)
                <option value="{{$unidade['id']}}"  {{ ($produto_detalhe['unidade_id'] ?? old('unidade_id')) == $unidade['id'] ? 'selected' : ''}}>{{$unidade['descricao']}}</option>
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
    <div cl
 ass="col-6 col-md-4"></div>
  </div>
</div>

@endsection
