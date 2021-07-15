@extends('app.layouts.basico')

@section('title', 'Produto Detalhes')

@section('conteudo')
<div class="container">
  <div class="text-center aligne-middle p-3 mb-2" style="color: white; background-color: rgb(84, 84, 230);">
    <p>Produto Detalhes</p>
  </div>

  @component('app.produto_detalhes.nav_produto')
  @endcomponent

  <div class="mx-auto row">
    <div class="col-6 col-md-2"></div>
    <div class="col-sm-8 ">
        @if (isset($_GET['message_success']))
            <div class="alert alert-warning" role="alert">
                {{$_GET['message_success']}}
            </div>
        @endif
      <table class="table table-dark table-hover table-sm p-2">
        <thead>
            <tr>
            <th scope="col" class="align-middle text-start">ID Produto</th>
            <th scope="col" class="align-middle text-start">Comprimento</th>
            <th scope="col" class="align-middle text-start">Largura</th>
            <th scope="col" class="align-middle text-start">Altura</th>
            <th scope="col" class="align-middle text-start">Unidade</th>
            <th scope="col" class="align-middle text-start"></th>
            <th scope="col" class="align-middle text-start"></th>
            <th scope="col" class="align-middle text-start"></th>
          </tr>
        </thead>

        <tbody>
          @foreach ($produto_detalhes as $produto_detalhe)
          <tr class="">
            <td class="align-middle text-start">
              <p>
                {{$produto_detalhe['produto_id']}}
              </p>
            </td>
            <td class="align-middle text-start">
              <p>
                {{$produto_detalhe['comprimento']}}
              </p>
            </td>
            <td class="align-middle text-start">
              <p>
                {{$produto_detalhe['largura']}}
              </p>
            </td>
            <td class="align-middle text-start">
              <p>
                {{$produto_detalhe['altura']}}
              </p>
            </td>
            <td class="align-middle text-center">
              <p>
                {{$produto_detalhe['unidade_id']}}
              </p>
            </td>
            <td>
              <a class="btn btn-info" href="{{route('produto_detalhes.show',['produto_detalhe' => $produto_detalhe])}}">Exibir</a>
            </td>
            <td>
              <a class="btn btn-warning" href="{{route('produto_detalhes.edit',['produto_detalhe' => $produto_detalhe['id']])}}">Editar</a>
            </td>
            <td>
                <form id="form_{{$produto_detalhe['id']}}" method="post" action="{{route('produto_detalhes.destroy',['produto_detalhe' => $produto_detalhe] ) }}">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-danger" href="#" onclick="document.getElementById('form_{{$produto_detalhe['id']}}').submit()">Excluir</a>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      {{ $produto_detalhes->appends($request)->links() }}
    </div>
    <div class="col-6 col-md-2"></div>
  </div>
</div>

@endsection
