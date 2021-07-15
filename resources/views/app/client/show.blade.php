@extends('app.layouts.basico')

@section('title', 'Produtos')

@section('conteudo')
<div class="container">
  <div class="text-center aligne-middle p-3 mb-2" style="color: white; background-color: rgb(84, 84, 230);">
    <p>Cliente - Visualizar - {{$cliente['nome']}}</p>
  </div>

  @component('app.client.nav_client')
  @endcomponent

  <div class="mx-auto row">
    <div class="col-6 col-md-2"></div>
    <div class="col-sm-8 ">
        <table class="table table-dark table-hover  p-2">
            <thead>
                <tr>
                    <td>ID:</td>
                    <td>{{$cliente['id']}}</td>
                </tr>
                <tr>
                    <td>Nome:</td>
                    <td>{{$cliente['nome']}}</td>
                </tr>
            </thead>
        </table>
    </div>
    <div class="col-6 col-md-2"></div>
  </div>
</div>

@endsection
