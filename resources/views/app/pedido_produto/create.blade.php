@extends('app.layouts.basico')

@section('title', 'Pedido')

@section('conteudo')
<div class="container">
  <div class="text-center aligne-middle p-3 mb-2" style="color: white; background-color: rgb(84, 84, 230);">
    <p>Adicionar Produto ao Pedido - Cadastrar</p>
  </div>

  <div class="mx-auto row">
    <div class="col-6 col-md-4"></div>
    <div class="col-sm-4 mt-3">
      @if (isset($_GET['message_success']))
      <div class="alert alert-success" role="alert">
        {{$_GET['message_success']}}
      </div>
      @endif
      <h4 class="text-dark">Detalhes do Pedido</h4>
      <p class="text-dark">ID Pedido: <strong>{{$pedido->id}}</strong></p>
      <p class="text-dark">Cliente: <strong>{{$pedido->cliente->nome}}</strong></p>
      <form method="post" action="{{route('pedido_produto.store', ['pedido' => $pedido])}}">
        @csrf

        @if (isset($pedido->produtos))
            <h4 class="text-dark">Itens do Pedido</h4>
            <table class="table table-dark table-hover table-sm">
                <thead>
                    <tr>
                        <th scope="col" class="align-middle text-center">ID Produto</th>
                        <th scope="col" class="align-middle text-center">Nome</th>
                        <th scope="col" class="align-middle text-center">Descrição</th>
                    </tr>
                </thead>
                <tbody>

                        @foreach ($pedido->produtos as $produto)
                            <tr class="">
                                <td class="align-middle text-center">
                                    <p>
                                        {{$produto['id']}}
                                    </p>
                                </td>
                                <td class="align-middle text-center">
                                    <p>
                                        {{$produto['nome']}}
                                    </p>
                                </td>
                                <td class="align-middle text-center">
                                    <p>
                                        {{$produto->descricao}}
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        <select class="mb-2 border border-dark" name="produto_id" id="">
            <option value="">-- Selecione o Produto --</option>
            @foreach ($produtos as $produto)
                <option value="{{$produto->id}}" {{ old('produto_id') == $produto->id ? 'selected' : ''}}>{{$produto->nome}}</option>
            @endforeach
        </select>
        @if($errors->has('produto_id'))
        <div class="alert-danger rounded p-1 ">
          {{$errors->first('produto_id')}}
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
