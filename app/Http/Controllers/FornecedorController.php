<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller {
  public function index() {
    return view("app.fornecedor.index");
  }

  public function view() {

    $fornecedores = ['Fornecedor 01'];

    $fornecedores_honda = [];

    return view("app.fornecedor.view", compact("fornecedores", "fornecedores_honda"));
  }
}
