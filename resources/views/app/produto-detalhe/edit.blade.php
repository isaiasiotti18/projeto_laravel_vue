@extends('layouts.basic_app')

@section('conteudo')
  <div class="conteudo-pagina">

    <div class="titulo-pagina-2">
      <p>Detalhes do Produto</p>
    </div>

    <div class="menu">
      <ul>
        <li><a href="#">Voltar</a></li>
      </ul>
    </div>
    <div class="informacao-pagina">

      <h4>
        Produto:
      </h4>

      <div><b>Nome:</b> {{ $produto_detalhe->produto->nome }}</div>
      <br>
      <div><b>Descrição:</b> {{ $produto_detalhe->produto->descricao }}</div>

      {{ $msg ?? '' }}
      <div style="width: 30%; margin-left: auto; margin-right: auto;">
        <p>{{ $msg ?? '' }}</p>
        @component('app.produto-detalhe.components.form_create_edit', [
          'unidades' => $unidades,
          'produto_detalhe' => $produto_detalhe
        ])
        @endcomponent
      </div>

    </div>

  </div>
@endsection
