<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal() {
        return view("site.principal");
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
