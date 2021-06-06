<?php

use Illuminate\Support\Facades\Route;

// ROTAS PÚBLICAS
Route::get(uri: '/', action: [App\Http\Controllers\PrincipalController::class, 'principal'])
    ->name('site.index');

Route::get(uri: '/sobre-nos', action: [App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

Route::get(uri: '/contato', action: [App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');

Route::post(uri: '/contato', action: [App\Http\Controllers\ContatoController::class, 'salvar'])->name('site.contato');

Route::get(uri: '/login', action: [App\Http\Controllers\LoginController::class, 'index'])->name('site.login');

Route::post(uri: '/login', action: [App\Http\Controllers\LoginController::class, 'autenticar'])->name('site.login');


//ROTAS DO ADMIN

Route::middleware('autenticacao:padrao')->prefix('/app')->group(function () {
    Route::get(uri: '/clientes', action: function () {
        return 'Clientes';
    })->name('app.clientes');

    Route::get(uri: '/fornecedores', action: [App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedores');

    Route::get(uri: '/produtos', action: function () {
        return 'Produtos';
    })->name('app.produtos');
});

Route::fallback(function () {
    $route = route('site.index');
    echo "A rota acessada não existe, clique <a href=" . $route . "> aqui </a> para ir para a página inicial.";
});
