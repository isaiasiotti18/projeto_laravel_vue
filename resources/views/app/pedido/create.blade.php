@extends('layouts.basic_app')

@section('conteudo')
  <div class="conteudo-pagina">

    <div class="titulo-pagina-2">
      @if (isset($cliente->id))
        <p>Pedido - Editar</p>
      @else
        <p>Pedido - Cadastrar</p>
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

        @component('app.pedido.components.form_create_edit', [
          'clientes' => $clientes
        ])
        @endcomponent

      </div>

    </div>

  </div>
@endsection
