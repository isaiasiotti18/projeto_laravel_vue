@extends('layouts.basic_app')

@section('titulo', 'Pedidos')

@section('conteudo')
  <div class="conteudo-pagina">

    <div class="titulo-pagina-2">
      <p>Pedidos</p>
    </div>

    <div class="menu">
      <ul>
        <li><a href="{{ route('pedido.create') }}">Novo</a></li>
        <li><a href="">Consulta</a></li>
      </ul>
    </div>

    <div class="informacao-pagina">
      <div style="width: 90%; margin-left: auto; margin-right: auto;">
        <table border="1" width="100%">
          <thead>
            <tr>
              <th>Código Pedido</th>
              <th>Código Cliente</th>
              <th>Adicione produtos ao pedido</th>
              <th>Detalhes do Pedido</th>
              <th colspan="2">Ações</th>
            </tr>
          </thead>

          <tbody>
            @if (isset($pedidos))
              @foreach ($pedidos as $pedido)
                <tr>
                  <td>{{ $pedido->id }}</td>
                  <td>{{ $pedido->cliente_id }}</td>
                  <td>
                    <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">
                      Adicione produtos ao pedido
                    </a>
                  </td>
                  <td><a href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}">Visualizar</a></td>
                  <td>
                    <form id="form_{{$pedido->id}}" name="formDelete" class="form-inline" action="{{ route('pedido.destroy', $pedido->id)}}" method="post">
                      @csrf
                      @method("DELETE")

                      {{-- <button class="btnExcluir" type="submit">Excluir</button> --}}
                    </form>
                    <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()" class="inlineA" href="{{ route('pedido.edit', $pedido->id)}}">Excluir | </a>
                    <a class="inlineA" href="{{ route('pedido.edit', $pedido->id)}}">Editar</a>
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
        <br>
        {{ $pedidos->appends($request)->links() }}
        <br><br>
        {{ $pedidos->count() }} Total de registros por página.
        <br><br>
        {{ $pedidos->firstItem() }} Número do primeiro registro da página
        <br><br>
        {{ $pedidos->lastItem() }} Número do último registro da página
        <br><br>
    </div>

  </div>

  <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>

  <style>
    .form-inline {
      display: inline-block
    }

    /* .inlineA {
      display: inline;
    } */

    .btnExcluir {
      font-size: 16px;
      background-color: transparent;
      background-repeat: no-repeat;
      border: none;
      cursor: pointer;
      overflow: hidden;
      outline: none;
      color: black
    }

    .btnExcluir:hover {
      background-color: transparent;
      background-repeat: no-repeat;
      border: none;
      cursor: pointer;
      overflow: hidden;
      outline: none;
      color: cadetblue;
    }

    a {
      text-decoration: none;
      color: black;
      font-size: 16px;
    }

    a:hover {
      color: cadetblue;
    }
  </style>
@endsection
