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
      ->simplePaginate(2);

    return view('app.fornecedor.listar', [
      'fornecedores' => $fornecedores,
      'request' => $request->all()
    ]);
  }

  public function adicionar(Request $request) {
    if($request->input("_token") != "" && $request->input('id') == '') {
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

    if($request->input("_token") != "" && $request->input('id') != '') {
      $fornecedorUpdate = Fornecedor::find($request->input('id'));
      $update = $fornecedorUpdate->update($request->all());

      if($update) {
        $msg = 'Alteração realizada com sucesso.';
      } else {
        $msg = 'Falha na alteração';
      }

      return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'),  'msg' => $msg]);
    }

    return view("app.fornecedor.adicionar");
  }

  public function editar($id) {

    $fornecedor = Fornecedor::find($id);
    return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor]);
  }
  public function excluir($id) {

    $fornecedor = Fornecedor::find($id)->delete();

    return redirect()->back()->with('alert', 'Registro excluido com sucesso!');

  }
}
