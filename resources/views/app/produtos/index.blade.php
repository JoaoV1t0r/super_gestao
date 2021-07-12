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
    <div class="col-6 col-md-2"></div>
    <div class="col-sm-8 ">
      <table class="table table-dark table-hover table-sm p-2">
        <thead>
            <tr>
            <th scope="col" class="align-middle text-start">Nome</th>
            <th scope="col" class="align-middle text-start">Descrição</th>
            <th scope="col" class="align-middle text-start">Peso</th>
            <th scope="col" class="align-middle text-start">Unidade ID</th>
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
                {{$produto['peso']}}
              </p>
            </td>
            <td class="align-middle text-start">
              <p>
                {{$produto['unidade_id']}}
              </p>
            </td>
            <td>
              <a class="btn btn-warning" href="">Editar</a>
            </td>
            <td>
              <a class="btn btn-danger" href="">Excluir</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      {{ $produtos->appends($request)->links() }}
    </div>
    <div class="col-6 col-md-2"></div>
  </div>
</div>

@endsection
