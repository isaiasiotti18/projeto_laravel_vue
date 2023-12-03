<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;

class ClientesController extends Controller {

  public function __construct() {
    $this->middleware(LogAcessoMiddleware::class);
  }
  public function index() {
    return view("app.clientes");
  }
}
