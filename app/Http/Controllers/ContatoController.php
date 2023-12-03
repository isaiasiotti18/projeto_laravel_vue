<?php

namespace App\Http\Controllers;

use App\Models\SiteContato;

use Illuminate\Http\Request;
use App\Models\MotivoContato;
use App\Http\Middleware\LogAcessoMiddleware;

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

    $request->validate(
      [
      "nome"=> "required|min:4|max:40",
      "telefone"=> "required",
      "email"=> "email",
      "motivo_contato_id"=> "required",
      "mensagem" => "required|min:10|max:250"
      ],
      [
        "required" => "O campo :attribute deve ser preenchido",

        "nome.min" => "O campo nome precisa de no mínimo 3 caracteres.",
        "nome.max" => "O campo nome precisa ter no máximo 40 caracteres.",

        "email.email" => "Não é um email válido.",

        "mensagem.min" => "mensagem precisa ter no minimo 10 caracteres.",

        "mensagem.max" => "mensagem precisa ter no máximo 250 caracteres."
      ]
    );

    $contato = new SiteContato();
    $contato->create($request->all());
    return redirect()->route('site.contato');
  }
}
