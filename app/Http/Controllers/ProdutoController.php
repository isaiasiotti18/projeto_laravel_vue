<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\ProdutoDetalhe;
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

      /*
      foreach($produtos as $key => $produto) {
        $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();
        if(isset($produtoDetalhe)) {
          $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
          $produtos[$key]['largura'] = $produtoDetalhe->largura;
          $produtos[$key]['altura'] = $produtoDetalhe->altura;
        }
      }
      */

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
      return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
      $unidades = Unidade::all();
      return view('app.produto.edit', [
        'unidades' => $unidades,
        'produto' => $produto
      ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
      $produto->update($request->all());

      return redirect()->route ('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
      $produto->delete();

      return redirect()
        ->route('produto.index')
        ->with('alert','Produto excluido com sucesso.');
    }
}
