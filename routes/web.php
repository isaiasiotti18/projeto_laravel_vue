<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobrenosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\ProdutosController;

Route::fallback(function() {
  echo 'Not found. <a href="/">Clique aqui</a> para retornar a página principal.';
});

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/view/{codigo}', [PrincipalController::class, 'viewPrincipal'])->name('site.view');

Route::get('/sobre-nos', [SobrenosController::class, 'sobrenos'])->name('site.sobrenos');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::get('/login', [LoginController::class, 'login'])->name('site.login');


Route::prefix('/app')->group(function () {
  Route::get('/fornecedores', [FornecedoresController::class, 'index'])->name('app.fornecedores');
  Route::get('/produtos', [ProdutosController::class, 'index'])->name('app.produtos');
  Route::get('/clientes', [ClientesController::class, 'index'])->name('app.clientes');
});

