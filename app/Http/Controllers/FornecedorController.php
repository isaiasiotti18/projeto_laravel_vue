<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;

class FornecedorController extends Controller {

  public function __construct() {
    $this->middleware(LogAcessoMiddleware::class);
  }

  public function index() {
    return view("app.fornecedor.index");
  }

  public function listar(Request $request) {

    $nomeFornecedor = $request->input('nome');
    $siteFornecedor = $request->input('site');
    $ufFornecedor = $request->input('uf');
    $$siteFornecedor = $request->input('site');

    $fornecedores = Fornecedor::where('nome', 'like', "%$nomeFornecedor%")
      ->where("site", "like", "%$siteFornecedor%")
      ->where("uf", "like", "%$ufFornecedor%")
      ->where("site", "like", "%$siteFornecedor%")
      ->get();

    return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }

  public function adicionar(Request $request) {
    if($request->input("_token") != "") {
      $rules = [
        "nome"=> "required|min:3|max:40",
        "site"=> "required",
        "uf"=>"required|min:2|max:2",
        "email"=> "email"
      ];

      $messages = [
        "required" => ":attribute é obrigatório",
        "nome.min" => ":attribute deve ter no minimo 3 caracteres e no máximo 40 caracteres",
        "nome.max" => ":attribute deve ter no minimo 3 caracteres e no máximo 40 caracteres",
        "uf.min" => ":attribute deve ter no minimo 2 caracteres e no máximo 2 caracteres",
        "uf.max" => ":attribute deve ter no minimo 2 caracteres e no máximo 2 caracteres",
        "email"=> "Email não foi preenchido corretamente",
      ];

      $request->validate($rules, $messages);

      $fornecedor = new Fornecedor();

      $fornecedor->create($request->all());
    }

    return view("app.fornecedor.adicionar");
  }

  public function editar($id) {
    return view('app.fornecedor.editar');
  }
  public function excluir($id) {
    return view('app.fornecedor.excluir');
  }
}
