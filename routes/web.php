<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobrenosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutosController;

Route::fallback(function() {
  echo 'Not found. <a href="/">Clique aqui</a> para retornar a página principal.';
});


Route::prefix('site')->group(function() {
  Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
  Route::get('/sobre-nos', [SobrenosController::class, 'sobrenos'])->name('site.sobrenos');

  Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
  Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');

  Route::get('/login', [LoginController::class, 'login'])->name('site.login');
});

Route::prefix('/app')->group(function () {
  Route::prefix('/fornecedores')->group(function () {
    Route::get('/home', [FornecedorController::class, 'index'])->name('app.fornecedor.index');
    Route::get('/view', [FornecedorController::class, 'view'])->name('app.fornecedor.view');
  });

  Route::get('/produtos', [ProdutosController::class, 'index'])->name('app.produtos');
  Route::get('/clientes', [ClientesController::class, 'index'])->name('app.clientes');
});

