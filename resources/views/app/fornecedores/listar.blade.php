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
        <div class="col-6 col-md-4"></div>
        <div class="col-sm-4 ">
            ...Listar...
        </div>
        <div class="col-6 col-md-4"></div>
    </div>
</div>

@endsection