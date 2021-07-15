@extends('app.layouts.basico')

@section('title', 'Cliente')

@section('conteudo')
<div class="container">
  <div class="text-center aligne-middle p-3 mb-2" style="color: white; background-color: rgb(84, 84, 230);">
    <p>Pedido - Cadastrar</p>
  </div>

  @component('app.pedido.nav_pedido')
  @endcomponent

  <div class="mx-auto row">
    <div class="col-6 col-md-4"></div>
    <div class="col-sm-4 ">
      @if (isset($_GET['message_success']))
      <div class="alert alert-success" role="alert">
        {{$_GET['message_success']}}
      </div>
      @endif
      <form method="post" action="{{route('pedido.store')}}">
        @csrf

        <input type="hidden" name="id" value="{{$pedido['id'] ?? ''}}">

        <select class="mb-2 border border-dark" name="cliente_id" id="">
            <option value="">-- Selecione o Cliente --</option>
            @foreach ($clientes as $cliente)
                <option value="{{$cliente['id']}}" {{ ($cliente['cliente_id'] ?? old('cliente_id')) == $cliente['id'] ? 'selected' : ''}}>{{$cliente['nome']}}</option>
            @endforeach
        </select>
        @if($errors->has('cliente_id'))
        <div class="alert-danger rounded p-1 ">
          {{$errors->first('cliente_id')}}
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
