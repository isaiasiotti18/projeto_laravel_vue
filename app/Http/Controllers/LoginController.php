<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\LogAcessoMiddleware;

class LoginController extends Controller {


  public function index(Request $request) {
    $erro = '';

    if($request->get('erro') == 1) {
        $erro = 'Usuário e ou senha não existe';
    }

    if($request->get('erro') == 2) {
      $erro = 'Acesso negado.';
    }

    return view('auth.login', ['erro' => $erro]);
  }

  public function login(Request $request) {

    // Regras de validação
    $regras = [
      "email" => "email",
      "password" => "required",
    ];

    $feedback = [
      "email.email" => "email/password inválido",
      "password.required" => "email/password inválido",
    ];

    $request->validate($regras, $feedback);

    $email = $request->get('email');
    $password = $request->get('password');

    $userExists = DB::table('users')
      ->where('email', $email)
      ->where('password', $password)
      ->get()
      ->first();

      if(isset($userExists->name)) {
        session_start();

        $_SESSION['nome'] = $userExists->name;
        $_SESSION['email'] = $userExists->email;

        return redirect()->route('app.home');
    } else {
        return redirect()->route('auth.login', ['erro' => 1]);
    }
  }

  public function sair() {
    session_destroy();
    return redirect()->route('auth.login0');
  }
}
