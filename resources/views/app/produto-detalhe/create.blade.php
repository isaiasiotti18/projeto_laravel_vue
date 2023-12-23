@extends('layouts.basic_app')

@section('conteudo')
  <div class="conteudo-pagina">

    <div class="titulo-pagina-2">
      @if (isset($produto->id))
        <p>Produto - Editar</p>
      @else
        <p>Produto Detalhe - Criar</p>
      @endif
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

        @component('app.produto-detalhe.components.form_create_edit', [
          'unidades' => $unidades
        ])
        @endcomponent

      </div>

    </div>

  </div>
@endsection
