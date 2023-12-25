<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SobrenosController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\PedidoProdutoController;
use App\Http\Controllers\ProdutoDetalheController;

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

  Route::prefix('/fornecedor')->group(function() {
    Route::get('/', [FornecedorController::class, 'index'])->name('app.fornecedor');

    Route::get('/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');

    Route::post('/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');

    Route::get('/editar/{id}/{msg?}', [FornecedorController::class, 'editar'])->name('app.fornecedor.editar');

    Route::get('/excluir/{id}/{msg?}', [FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');
  });


  // -- Rota Produtos
  Route::resource('produto', ProdutoController::class);

  // -- Rota Produto Detalhes
  Route::resource('produto-detalhe', ProdutoDetalheController::class);

  // -- Rota Clientes
  Route::resource('cliente', ClienteController::class);

  // -- Rota Pedidos
  Route::resource('pedido', PedidoController::class);

  // -- Rota Pedido Produtos
  Route::resource('pedido-produto', PedidoProdutoController::class);

});

