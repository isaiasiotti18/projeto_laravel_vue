<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;

class FornecedorController extends Controller {

  public function __construct() {
    $this->middleware(LogAcessoMiddleware::class);
  }

  public function view() {

    $fornecedores = ['Fornecedor 01'];

    $fornecedores_honda = [];

    return view("app.fornecedor.view", compact("fornecedores", "fornecedores_honda"));
  }
}
