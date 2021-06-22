@extends('app.layouts.basico')

@section('title', 'Fornecedor')

@section('conteudo')
<div class="container">
    <div class="text-center aligne-middle p-3 mb-2" style="color: white; background-color: rgb(84, 84, 230);">
        <p>Fornecedor</p>
    </div>

    @component('app.fornecedores.nav_fornecedor', ['function_form' => 'Pesquisar'])
    @endcomponent

    <div class="mx-auto row">
        <div class="col-6 col-md-4"></div>
        <div class="col-sm-4 ">
            <form method="post" action="{{ route('app.fornecedor.listar') }}">
                @csrf
                <input type="text" name="nome" class="mb-2 border border-dark" placeholder="Nome">
                <input type="text" name="site" class="mb-2 border border-dark" placeholder="Site">
                <input type="text" name="uf" class="mb-2 border border-dark" placeholder="UF">
                <input type="email" name="email" class="mb-2 border border-dark" placeholder="E-mail">
                <button type="submit" class="btn btn-outline-primary">Pesquisar</button>
            </form>
        </div>
        <div class="col-6 col-md-4"></div>
    </div>
</div>

@endsection