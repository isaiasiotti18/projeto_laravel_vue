<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;

class ProdutosController extends Controller {

  public function index() {
    return view("app.produtos");
  }
}
