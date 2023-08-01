<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {return 'Curso Laravel';});

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::get('/contato/{nome}/{assunto}/{categoria_id?}', 
    function(
        string $nome, 
        string $assunto, 
        string $mensagem = 'Mensagem não informada!'){
    echo "Sua solicitação: $nome - $assunto - $mensagem";
})->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');
Route::get('/sobre', [\App\Http\Controllers\SobreNosController::class, 'sobre'])->name('site.sobrenos');

Route::get('/login', function(){return 'Login';})->name('site.login');

Route::prefix('/app')->group(function(){
    Route::get('/clientes',  function(){return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores',  function(){return 'Fornecedores';})->name('app.fornecedores');
    Route::get('/produtos',  function(){return 'Produtos';})->name('app.produtos');
});

// Gabriel Lucas

// Route::get('/sobre', function () {return 'Sobre';});

// Route::get('/contato', function () {return 'Contato';});

// Verbos http get, post, put, patch, delete, options