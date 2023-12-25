@extends('layouts.basic_app')

@section('conteudo')
  <div class="conteudo-pagina">

    <div class="titulo-pagina-2">
      @if (isset($cliente->id))
        <p>Cliente - Editar</p>
      @else
        <p>Cliente - Cadastrar</p>
      @endif
    </div>

    <div class="menu">
      <ul>
        <li><a href="{{ route('cliente.index') }}">Voltar</a></li>
      </ul>
    </div>
    <div class="informacao-pagina">
      {{ $msg ?? '' }}
      <div style="width: 30%; margin-left: auto; margin-right: auto;">
        <p>{{ $msg ?? '' }}</p>

        @component('app.cliente.components.form_create_edit')
        @endcomponent

      </div>

    </div>

  </div>
@endsection
