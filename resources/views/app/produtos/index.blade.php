@extends('app.layouts.basico')

@section('title', 'Produtos')

@section('conteudo')
<div class="container">
  <div class="text-center aligne-middle p-3 mb-2" style="color: white; background-color: rgb(84, 84, 230);">
    <p>Produtos - Listar</p>
  </div>

  @component('app.produtos.nav_produto')
  @endcomponent

  <div class="mx-auto row">
    {{-- <div class="col-1 col-md-2"></div> --}}
    <div class="col">
        @if (isset($_GET['message_success']))
            <div class="alert alert-warning" role="alert">
                {{$_GET['message_success']}}
            </div>
        @endif
      <table class="table table-dark table-hover table-sm p-2">
        <thead>
            <tr>
            <th scope="col" class="align-middle text-start">Nome</th>
            <th scope="col" class="align-middle text-start">Descrição</th>
            <th scope="col" class="align-middle text-start">Fornecedor</th>
            <th scope="col" class="align-middle text-start">Qnt Vendida</th>
            <th scope="col" class="align-middle text-start">Peso</th>
            <th scope="col" class="align-middle text-start">Unidade ID</th>
            <th scope="col" class="align-middle text-start">Comprimento</th>
            <th scope="col" class="align-middle text-start">Largura</th>
            <th scope="col" class="align-middle text-start">Altura</th>
            <th scope="col" class="align-middle text-start"></th>
            <th scope="col" class="align-middle text-start"></th>
            <th scope="col" class="align-middle text-start"></th>
          </tr>
        </thead>

        <tbody>
          @foreach ($produtos as $produto)
            <tr class="">
                <td class="align-middle text-start">
                    <p>
                        {{$produto['nome']}}
                    </p>
                </td>
                <td class="align-middle text-start">
                    <p>
                        {{$produto['descricao']}}
                    </p>
                </td>
                <td class="align-middle text-start">
                    <p>
                        {{$produto->fornecedor->nome}}
                    </p>
                </td>
                <td class="align-middle text-start">
                    <p>
                        {{count($produto->pedidos)}}
                    </p>
                </td>
                <td class="align-middle text-start">
                    <p>
                        {{$produto['peso']}}
                    </p>
                </td>
                <td class="align-middle text-center">
                    <p>
                        {{$produto['unidade_id']}}
                    </p>
                </td>
                <td class="align-middle text-center">
                    <p>{{$produto->produtoDetalhe->comprimento ?? ''}}</p>
                </td>
                <td class="align-middle text-center">
                    <p>{{$produto->produtoDetalhe->largura ?? ''}}</p>
                </td>
                <td class="align-middle text-center">
                    <p>{{$produto->produtoDetalhe->altura ?? ''}}</p>
                </td>
                <td>
                    <a class="btn btn-info" href="{{route('produto.show',['produto' => $produto])}}">Exibir</a>
                </td>
                <td>
                    <a class="btn btn-warning" href="{{route('produto.edit',['produto' => $produto])}}">Editar</a>
                </td>
                <td>
                    <form id="form_{{$produto['id']}}" method="post" action="{{route('produto.destroy',['produto' => $produto] ) }}">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-danger" href="#" onclick="document.getElementById('form_{{$produto['id']}}').submit()">Excluir</a>
                    </form>
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      {{ $produtos->appends($request)->links() }}
    </div>
    {{-- <div class="col-2 col-md-2"></div> --}}
  </div>
</div>

@endsection
