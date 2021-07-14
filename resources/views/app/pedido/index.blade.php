@extends('app.layouts.basico')

@section('title', 'Cliente')

@section('conteudo')
<div class="container">
  <div class="text-center aligne-middle p-3 mb-2" style="color: white; background-color: rgb(84, 84, 230);">
    <p>Pedido - Listar</p>
  </div>

  @component('app.pedido.nav_pedido')
  @endcomponent

  <div class="mx-auto row">
    <div class="col">
        @if (isset($_GET['message_success']))
            <div class="alert alert-warning" role="alert">
                {{$_GET['message_success']}}
            </div>
        @endif
      <table class="table table-dark table-hover table-sm p-2">
        <thead>
            <tr>
            <th scope="col" class="align-middle text-center">ID</th>
            <th scope="col" class="align-middle text-center">Cliente</th>
            <th scope="col" class="align-middle text-start"></th>
            <th scope="col" class="align-middle text-start"></th>
            <th scope="col" class="align-middle text-start"></th>
          </tr>
        </thead>

        <tbody>
          @foreach ($pedidos as $pedido)
            <tr class="">
                <td class="align-middle text-center">
                    <p>
                        {{$pedido['id']}}
                    </p>
                </td>
                <td class="align-middle text-center">
                    <p>
                        {{$pedido->cliente->nome}}
                    </p>
                </td>
                <td class="align-middle text-center">
                    <a class="btn btn-info" href="{{route('pedido.show',['pedido' => $pedido])}}">Exibir</a>
                </td>
                <td class="align-middle text-center">
                    <a class="btn btn-warning" href="{{route('pedido.edit',['pedido' => $pedido])}}">Editar</a>
                </td>
                <td class="align-middle text-center">
                    <form id="form_{{$pedido['id']}}" method="post" action="{{route('pedido.destroy',['pedido' => $pedido] ) }}">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-danger" href="#" onclick="document.getElementById('form_{{$pedido['id']}}').submit()">Excluir</a>
                    </form>
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      {{ $pedidos->appends($request)->links() }}
    </div>
  </div>
</div>

@endsection
