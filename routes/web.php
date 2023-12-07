<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\SobrenosController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\FornecedorController;

Route::fallback(function() {
  echo 'Not found. <a href="/site/">Clique aqui</a> para retornar a página principal.';
});

Route::redirect('/', "/site");

Route::get('/auth/login/{erro?}', [LoginController::class, 'index'])->name('auth.login');
Route::post('/auth/login', [LoginController::class, 'login'])->name('auth.login');

Route::prefix('site')->group(function() {

  Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');

  Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');

  Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato.post');

  Route::get('/sobre-nos', [SobrenosController::class, 'sobrenos'])->name('site.sobrenos');
});

Route::prefix('/app')->middleware('app.authenticate')->group(function () {
  Route::get('/home', [HomeController::class, 'index'])->name('app.home');
  Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
  Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedor');
  Route::get('/produto', [ProdutosController::class, 'index'])->name('app.produto');
  Route::get('/cliente', [ClienteController::class, 'index'])->name('app.cliente');
});

