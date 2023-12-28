@extends('layouts.basic_app')

@section('titulo', 'Pedido Produto')

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
      <div>
        <h4>Detalhes do Pedido</h4>
        <p>ID do pedido: {{ $pedido->id }}</p>
        <p>Cliente: {{ $pedido->cliente_id }}</p>
      </div>

      <div @style([ "width: 50%", "margin: auto;" ])>
        <h4 style="text-align: center">Itens do Pedido:</h4>
        <ul @style([ "width: 100%" ])>
          @foreach ($pedido->produtos as $produto)
            <li>{{ $produto->id }} | {{ $produto->nome }}</li>
          @endforeach
        </ul>
      </div>

      <div style="width: 30%; margin-left: auto; margin-right: auto;">
        @component('app.pedido-produto.components.form_create_edit', [
          'pedido' => $pedido,
          'produtos' => $produtos
        ])
        @endcomponent
      </div>


    </div>

  </div>
@endsection
