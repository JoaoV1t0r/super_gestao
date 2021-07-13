@extends('app.layouts.basico')

@section('title', 'Produtos')

@section('conteudo')
<div class="container">
  <div class="text-center aligne-middle p-3 mb-2" style="color: white; background-color: rgb(84, 84, 230);">
    <p>Produto - Visualizar - {{$produto['nome']}}</p>
  </div>

  @component('app.produtos.nav_produto')
  @endcomponent

  <div class="mx-auto row">
    <div class="col-6 col-md-2"></div>
    <div class="col-sm-8 ">
        <table class="table table-dark table-hover  p-2">
            <thead>
                <tr>
                    <td>ID:</td>
                    <td>{{$produto['id']}}</td>
                </tr>
                <tr>
                    <td>Nome:</td>
                    <td>{{$produto['nome']}}</td>
                </tr>
                <tr>
                    <td>Descrição:</td>
                    <td>{{$produto['descricao']}}</td>
                </tr>
                <tr>
                    <td>Peso:</td>
                    <td>{{$produto['peso']}}</td>
                </tr>
                <tr>
                    <td>Unidade de Medida:</td>
                    <td>{{$produto['unidade_id']}}</td>
                </tr>
            </thead>
        </table>
    </div>
    <div class="col-6 col-md-2"></div>
  </div>
</div>

@endsection
