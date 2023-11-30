<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotivoContato;
use App\Enums\MotivoContatoEnum;

class PrincipalController extends Controller
{
    public function principal() {

      $motivo_contatos = MotivoContato::all();

      return view("site.principal", ['motivo_contatos' => $motivo_contatos]);
    }

    /*
    public function viewPrincipal(string $cliente, int $codigo) {
      // return view("site.view", ['codigo' => $codigo]); // array associativo

      // return view("site.view", compact('codigo')); // compact

      return view('site.view')
        ->with('codigo', $codigo)
        ->with('cliente', $cliente);
    }
    */
}
