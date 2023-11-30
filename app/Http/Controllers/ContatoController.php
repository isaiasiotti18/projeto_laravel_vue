<?php

namespace App\Http\Controllers;

use App\Models\SiteContato;

use Illuminate\Http\Request;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
  public function contato(Request $request)
  {

    // $contato = SiteContato::create([
    //   "nome" => $request->input("nome"),
    //   "telefone" => $request->input("telefone"),
    //   "email" => $request->input("email"),
    //   "motivo_contato" => $request->input("motivo_contato"),
    //   "mensagem" => $request->input("mensagem")
    // ]);
    // print_r($contato->getAttributes());

    // $contato = new SiteContato();
    // $contato->fill($request->all());
    // $contato->save();

    // $contato = new SiteContato();
    // $contato->create($request->all());

    $motivo_contatos = MotivoContato::all();

    return view("site.contato", ['motivo_contatos' => $motivo_contatos]);
  }

  public function salvar(Request $request) {

    $request->validate([
      "nome"=> "required|min:4|max:40",
      "telefone"=> "required",
      "email"=> "required",
      "motivo_contato"=> "required",
      "mensagem" => "required|min:10|max:250"
    ]);

    $contato = new SiteContato();
    $contato->create($request->all());
  }
}
