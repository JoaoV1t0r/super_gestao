@extends('app.layouts.basico')

@section('title', 'Fornecedor')

@section('conteudo')
<div class="container">
  <div class="text-center aligne-middle p-3 mb-2" style="color: white; background-color: rgb(84, 84, 230);">
    <p>Fornecedor - Listar</p>
  </div>

  @component('app.fornecedores.nav_fornecedor', ['function_form' => 'Pesquisar'])
  @endcomponent

  <div class="mx-auto row">
    <div class="col ">
      <table class="table table-dark table-hover table-sm p-2">
        <thead>
          <tr>
            <th scope="col" class="align-middle text-start">Nome</th>
            <th scope="col" class="align-middle text-start">E-mail</th>
            <th scope="col" class="align-middle text-start">Site</th>
            <th scope="col" class="align-middle text-start">UF</th>
            <th scope="col" class="align-middle text-start"></th>
            <th scope="col" class="align-middle text-start"></th>
          </tr>
        </thead>

        <tbody>
          @foreach ($fornecedores as $fornecedor)
          <tr class="">
            <td class="align-middle text-start">
              <p>
                {{$fornecedor['nome']}}
              </p>
            </td>
            <td class="align-middle text-start">
              <p>
                {{$fornecedor['email']}}
              </p>
            </td>
            <td class="align-middle text-start">
              <p>
                {{$fornecedor['site']}}
              </p>
            </td>
            <td class="align-middle text-start">
              <p>
                {{$fornecedor['uf']}}
              </p>
            </td>
            <td>
              <a class="btn btn-warning" href="{{route('app.fornecedor.editar', $fornecedor['id'])}}">Editar</a>
            </td>
            <td>
              <a class="btn btn-danger" href="{{route('app.fornecedor.excluir', $fornecedor['id'])}}">Excluir</a>
            </td>
          </tr>
          <tr>
              <td colspan="9">
                  <p>Lista de Produtos</p>
                  <table class="border  border-3 table table-dark table-hover table-sm">
                    <thead>
                        <th scope="col" class="align-middle text-start">ID</th>
                        <th scope="col" class="align-middle text-start">Nome</th>
                        <th scope="col" class="align-middle text-start">Descrição</th>
                        <th scope="col" class="align-middle text-start"></th>
                    </thead>
                    <tbody>
                        @foreach ($fornecedor->produtos as $produto)
                            <tr>
                                <td class="align-middle text-start">
                                    <p>
                                        {{$produto->id}}
                                    </p>
                                </td>
                                <td class="align-middle text-start">
                                    <p>
                                        {{$produto->nome}}
                                    </p>
                                </td>
                                <td class="align-middle text-start">
                                    <p>
                                        {{$produto->descricao}}
                                    </p>
                                </td>
                                <td>
                                    <a class="btn btn-info" href="{{route('produto.show', $produto->id)}}">Exibir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      {{ $fornecedores->appends($request)->links() }}
    </div>
  </div>
</div>

@endsection
