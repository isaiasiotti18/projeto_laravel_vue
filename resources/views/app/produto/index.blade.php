@extends('layouts.basic_app')

@section('conteudo')
  <div class="conteudo-pagina">

    <div class="titulo-pagina-2">
      <p>Produto - Index</p>
    </div>

    <div class="menu">
      <ul>
        <li><a href="{{ route('produto.create') }}">Novo</a></li>
        <li><a href="">Consulta</a></li>
      </ul>
    </div>

    <div class="informacao-pagina">
      <div style="width: 90%; margin-left: auto; margin-right: auto;">
        <table border="1" width="100%">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Descrição</th>
              <th>Fornecedor</th>
              <th>Peso</th>
              <th>Unidade</th>
              <th>Comprimento</th>
              <th>Altura</th>
              <th>Largura</th>
              <th>Visualizar</th>
              <th colspan="col">Ações</th>
            </tr>
          </thead>

          <tbody>
            @if (isset($produtos))
              @foreach ($produtos as $produto)
                <tr>
                  <td>{{ $produto->nome }}</td>
                  <td>{{ $produto->descricao }}</td>
                  <td>{{ $produto->fornecedor->nome }} | {{ $produto->fornecedor->email }}</td>
                  <td>{{ $produto->peso }}</td>
                  <td>{{ $produto->unidade_id }}</td>
                  <td>{{ $produto->produtoDetalhe->comprimento ?? '' }}</td>
                  <td>{{ $produto->produtoDetalhe->altura ?? '' }}</td>
                  <td>{{ $produto->produtoDetalhe->largura ?? '' }}</td>
                  <td><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></td>
                  <td>
                    <form id="form_{{$produto->id}}" name="formDelete" class="form-inline" action="{{ route('produto.destroy', $produto->id)}}" method="post">
                      @csrf
                      @method("DELETE")

                      {{-- <button class="btnExcluir" type="submit">Excluir</button> --}}
                    </form>
                    <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()" class="inlineA" href="{{ route('produto.edit', $produto->id)}}">Excluir | </a>
                    <a class="inlineA" href="{{ route('produto.edit', $produto->id)}}">Editar</a>
                  </td>

                  <tr>
                    <td colspan="12">
                      <p>Pedidos</p>
                      @foreach ($produto->pedidos as $pedido)
                        <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">
                          Pedido: {{ $pedido }} <br><br>
                        </a>
                      @endforeach
                    </td>
                  </tr>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
        <br>
        {{ $produtos->appends($request)->links() }}
        <br><br>
        {{ $produtos->count() }} Total de registros por página.
        <br><br>
        {{ $produtos->firstItem() }} Número do primeiro registro da página
        <br><br>
        {{ $produtos->lastItem() }} Número do último registro da página
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
