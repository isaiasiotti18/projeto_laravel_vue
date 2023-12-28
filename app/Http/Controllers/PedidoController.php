<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $itemsPerPage = 10)
    {
      $pedidos = Pedido::paginate($itemsPerPage);
      return view('app.pedido.index', [
        'pedidos' => $pedidos,
        'request' => $request->all(),
        'itemsPerPage' => $itemsPerPage
      ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

      $clientes = Cliente::all();

      return view('app.pedido.create', [
        'clientes' => $clientes
      ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $rules = [
        "cliente_id"=> "exists:clientes,id",
      ];

      $messages = [
        "exists" => "O cliente informado não existe."
      ];

      $request->validate($rules, $messages);

      Pedido::create($request->all());
      return redirect()
        ->route('pedido.index')
        ->with('alert','Novo pedido criado.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
