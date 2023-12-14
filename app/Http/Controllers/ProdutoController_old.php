<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;

class ProdutoController extends Controller
{

  public function __construct()
  {
    $this->middleware(LogAcessoMiddleware::class);
  }
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request, $itemsPerPage = 10)
  {
    $nomeProduto = $request->input('nome');
    $descricaoProduto = $request->input('site');
    $pesoProduto = $request->input('peso');

    $produtos = Produto::where('nome', 'like', "%$nomeProduto%")
      ->where("descricao", "like", "%$descricaoProduto%")
      ->where("peso", "like", "%$pesoProduto%")
      ->simplePaginate($itemsPerPage);

    return view('app.produto.index', [
      'produtos' => $produtos,
      'request' => $request->all(),
      'itemsPerPage' => $itemsPerPage
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Produto $produto)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Produto $produto)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Produto $produto)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Produto $produto)
  {
    //
  }
}
