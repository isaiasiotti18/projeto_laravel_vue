<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\PedidoProduto;

class PedidoProdutoController extends Controller
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
    public function create(Pedido $pedido)
    {
      $produtos = Produto::all();

      $pedido->with('produtos')->get();

      return view('app.pedido-produto.create', [
        'pedido' => $pedido,
        'produtos' => $produtos
      ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $rules = [
        "produto_id" => "exists:produtos,id",
        "pedido_id" => "exists:pedidos,id",
        "quantidade" => "required|min:1|max:999"
      ];

      $messages = [
        "exists" => "O cliente informado não existe.",
        "quantidade.min" => "O valor não pode ser inferior a 1",
        "quantidade.max" => "O valor não pode ser superior a 999",
        "required" => "O campo :atribute é obrigatório"
      ];

      $request->validate($rules, $messages);

      PedidoProduto::create($request->all());

      return redirect()->route('pedido-produto.create', [
        'pedido' => $request->get('pedido_id')
      ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PedidoProduto $pedidoProduto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PedidoProduto $pedidoProduto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PedidoProduto $pedidoProduto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PedidoProduto $pedidoProduto)
    {
        //
    }
}
