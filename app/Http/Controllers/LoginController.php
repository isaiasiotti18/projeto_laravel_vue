<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;

class LoginController extends Controller {


  public function login() {
    return view("auth.login");
  }
}
