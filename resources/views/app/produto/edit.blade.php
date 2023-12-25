@extends('layouts.basic_app')

@section('conteudo')
  <div class="conteudo-pagina">

    <div class="titulo-pagina-2">
      <p>Produto - Edit</p>
    </div>

    <div class="menu">
      <ul>
        <li><a href="{{ route('produto.index') }}">Voltar</a></li>
      </ul>
    </div>
    <div class="informacao-pagina">
      {{ $msg ?? '' }}
      <div style="width: 30%; margin-left: auto; margin-right: auto;">
        <p>{{ $msg ?? '' }}</p>
        @component('app.produto.components.form_create_edit', [
          'unidades' => $unidades,
          'produto' => $produto,
          'fornecedores' => $fornecedores
        ])
        @endcomponent
      </div>

    </div>

  </div>
@endsection
