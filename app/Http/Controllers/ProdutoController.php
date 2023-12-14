<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
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
      $unidades = Unidade::all();
      return view('app.produto.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

      $rules = [
        "nome"=> "required|min:3|max:40",
        "descricao"=> "required",
        "peso"=>"required|integer",
        "unidade_id" => "exists:unidades,id"
      ];

      $messages = [
        "required" => ":attribute é obrigatório",
        "nome.min" => ":attribute deve ter no minimo 3 caracteres e no máximo 40 caracteres",
        "nome.max" => ":attribute deve ter no minimo 3 caracteres e no máximo 40 caracteres",
        "descricao.min" => ":attribute deve ter no minimo 3 caracteres e no máximo 2000 caracteres",
        "descricao.max" => ":attribute deve ter no minimo 3 caracteres e no máximo 2000 caracteres",
        "peso.integer"=> "Peso deve ser um número inteiro",
      ];

      $request->validate($rules, $messages);

      Produto::create($request->all());
      return redirect()
        ->route('produto.index')
        ->with('alert','Produto inserido com sucesso.');
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
