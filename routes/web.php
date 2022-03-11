<?php

use Illuminate\Support\Facades\Route;

Route::get(uri: '/', action: [App\Http\Controllers\PrincipalController::class, 'principal'])
    ->name('site.index');

Route::get(uri: '/sobre-nos', action: [App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

Route::get(uri: '/contato', action: [App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');

Route::post(uri: '/contato', action: [App\Http\Controllers\ContatoController::class, 'salvar'])->name('site.contato.post');

Route::get(uri: '/login', action: [App\Http\Controllers\LoginController::class, 'index'])->name('site.login');

Route::post(uri: '/login', action: [App\Http\Controllers\LoginController::class, 'autenticar'])->name('site.login.post');


//ROTAS DO ADMIN

Route::middleware('autenticacao')->prefix('/app')->group(function () {
    Route::get(uri: '/home', action: [App\Http\Controllers\HomeController::class, 'index'])->name('app.home');
    Route::get(uri: '/sair', action: [App\Http\Controllers\LoginController::class, 'sair'])->name('app.sair');

    Route::get('/fornecedor', [App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::post('/fornecedor/listar', [App\Http\Controllers\FornecedorController::class, 'listar'])->name('app.fornecedor.listar.post');
    Route::get('/fornecedor/listar', [App\Http\Controllers\FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/cadastrar', [App\Http\Controllers\FornecedorController::class, 'viewCadastrar'])->name('app.fornecedor.cadastrar');
    Route::post('/fornecedor/cadastrar', [App\Http\Controllers\FornecedorController::class, 'cadastrar'])->name('app.fornecedor.cadastrar.post');
    Route::get('/fornecedor/editar/{id}', [App\Http\Controllers\FornecedorController::class, 'editar'])->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', [App\Http\Controllers\FornecedorController::class, 'delete'])->name('app.fornecedor.excluir');


    Route::resource(name: '/produto_detalhes', controller: App\Http\Controllers\ProdutoDetalheController::class);

    // Route::resource(name: '/pedido_produto', controller: App\Http\Controllers\PedidoProdutoController::class);
    Route::resource(name: '/pedido', controller: App\Http\Controllers\PedidoController::class);
    Route::resource(name: '/cliente', controller: App\Http\Controllers\ClienteController::class);
    Route::resource(name: '/produto', controller: App\Http\Controllers\ProdutoController::class);
    Route::get(uri: '/pedido_produtos/create/{pedido}', action: [App\Http\Controllers\PedidoProdutoController::class, 'create'])->name('pedido_produto.create');
    Route::post(uri: '/pedido_produtos/store/{pedido}', action: [App\Http\Controllers\PedidoProdutoController::class, 'store'])->name('pedido_produto.store');
});

Route::fallback(function () {
    $route = route('site.index');
    echo "A rota acessada não existe, clique <a href=" . $route . "> aqui </a> para ir para a página inicial.";
});
