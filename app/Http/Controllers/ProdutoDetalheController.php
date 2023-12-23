<?php

namespace App\Http\Controllers;

use App\Models\Unidade;
use Illuminate\Http\Request;
use App\Models\ProdutoDetalhe;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $unidades = Unidade::all();
      return view("app.produto-detalhe.create", [
        "unidades" => $unidades
      ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

      $comprimento = doubleval($request->input('comprimento'));
      $largura = doubleval($request->input('largura'));
      $altura = doubleval($request->input('altura'));

      ProdutoDetalhe::create([
        "produto_id" => $request->input('produto_id'),
        "comprimento" => $comprimento,
        "largura" => $largura,
        "altura" => $altura,
        "unidade_id" => $request->input('unidade_id')
      ]);

      return redirect()
      ->route('produto-detalhe.create')
      ->with('alert','Registro no banco de dados inserido com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProdutoDetalhe $produtoDetalhe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdutoDetalhe $produtoDetalhe)
    {
      $unidades = Unidade::all();
      return view("app.produto-detalhe.edit", [
        "produto_detalhe" => $produtoDetalhe,
        "unidades" => $unidades
      ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProdutoDetalhe $produtoDetalhe)
    {
      $produtoDetalhe->update($request->all());

      return redirect()->route ('produto-detalhe.index', ['produto' => $produtoDetalhe->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProdutoDetalhe $produtoDetalhe)
    {
        //
    }
}
