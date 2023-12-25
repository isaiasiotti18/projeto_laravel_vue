<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $itemsPerPage = 10)
    {
      $clientes = Cliente::paginate($itemsPerPage);
      return view('app.cliente.index', [
        'clientes' => $clientes,
        'request' => $request->all(),
        'itemsPerPage' => $itemsPerPage
      ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('app.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $rules = [
        "nome"=> "required|min:3|max:40",
      ];

      $messages = [
        "required" => ":attribute é obrigatório",
        "nome.min" => ":attribute deve ter no minimo 3 caracteres e no máximo 40 caracteres",
        "nome.max" => ":attribute deve ter no minimo 3 caracteres e no máximo 40 caracteres",
      ];

      $request->validate($rules, $messages);

      Cliente::create($request->all());
      return redirect()
        ->route('cliente.index')
        ->with('alert','Cliente registrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
