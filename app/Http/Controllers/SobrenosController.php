<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;

class SobrenosController extends Controller
{
  public function sobrenos()
  {
    return view("site.sobre-nos");
  }
}
