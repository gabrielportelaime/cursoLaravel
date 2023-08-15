<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index')->middleware('log.acesso');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'salvar'])->name('site.contato');
Route::get('/contato/{nome}/{assunto}/{categoria_id?}', 
    function(
        string $nome, 
        string $assunto, 
        string $mensagem = 'Mensagem não informada!'){
    echo "Sua solicitação: $nome - $assunto - $mensagem";
})->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');
Route::get('/sobre', [\App\Http\Controllers\SobreNosController::class, 'sobre'])->name('site.sobrenos');

Route::get('/login', function(){return 'Login';})->name('site.login');

Route::middleware('autenticacao')->prefix('/app')->group(function(){
    Route::get('/clientes',  function(){return 'Clientes';})
    ->name('app.clientes');
    Route::get('/fornecedores', [\App\Http\Controllers\FornecedorController::class, 'index'])
    ->name('app.fornecedores');
    Route::get('/produtos',  function(){return 'Produtos';})
    ->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class, 'teste'])->name('teste');

Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para retornar a página principal!';
});

// Route::get('/sobre', function () {return 'Sobre';});
// Route::get('/contato', function () {return 'Contato';});
// Verbos http get, post, put, patch, delete, options