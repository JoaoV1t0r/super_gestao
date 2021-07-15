@extends('app.layouts.basico')

@section('title', 'Cliente')

@section('conteudo')
<div class="container">
  <div class="text-center aligne-middle p-3 mb-2" style="color: white; background-color: rgb(84, 84, 230);">
    <p>Cliente - Listar</p>
  </div>

  @component('app.client.nav_client')
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
            <th scope="col" class="align-middle text-center">Nome</th>
            <th scope="col" class="align-middle text-start"></th>
            <th scope="col" class="align-middle text-start"></th>
            <th scope="col" class="align-middle text-start"></th>
          </tr>
        </thead>

        <tbody>
          @foreach ($clientes as $cliente)
            <tr class="">
                <td class="align-middle text-center">
                    <p>
                        {{$cliente['nome']}}
                    </p>
                </td>
                <td class="align-middle text-center">
                    <a class="btn btn-info" href="{{route('cliente.show',['cliente' => $cliente])}}">Exibir</a>
                </td>
                <td class="align-middle text-center">
                    <a class="btn btn-warning" href="{{route('cliente.edit',['cliente' => $cliente])}}">Editar</a>
                </td>
                <td class="align-middle text-center">
                    <form id="form_{{$cliente['id']}}" method="post" action="{{route('cliente.destroy',['cliente' => $cliente] ) }}">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-danger" href="#" onclick="document.getElementById('form_{{$cliente['id']}}').submit()">Excluir</a>
                    </form>
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      {{ $clientes->appends($request)->links() }}
    </div>
  </div>
</div>

@endsection
