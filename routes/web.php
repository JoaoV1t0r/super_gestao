<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');

Route::get('/sobre-nos', [App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

Route::get('/contato', [App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');

Route::post('/contato', [App\Http\Controllers\ContatoController::class, 'salvar'])->name('site.contato');

Route::get('/login', function () {
    return 'Login';
})->name('site.login');

Route::prefix('/app')->group(function () {
    Route::get('/clientes', function () {
        return 'Clientes';
    })->name('app.clientes');

    Route::get('/fornecedores', [App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedores');

    Route::get('/produtos', function () {
        return 'Produtos';
    })->name('app.produtos');
});

Route::fallback(function () {
    $route = route('site.index');
    echo "A rota acessada não existe, clique <a href=" . $route . "> aqui </a> para ir para a página inicial.";
});
