@extends('layouts.basic_app')

@section('titulo', 'Cliente')

@section('conteudo')
  <div class="conteudo-pagina">

    <div class="titulo-pagina-2">
      <p>Clientes cadastrados</p>
    </div>

    <div class="menu">
      <ul>
        <li><a href="{{ route('cliente.create') }}">Novo</a></li>
        <li><a href="">Consulta</a></li>
      </ul>
    </div>

    <div class="informacao-pagina">
      <div style="width: 90%; margin-left: auto; margin-right: auto;">
        <table border="1" width="100%">
          <thead>
            <tr>
              <th>Nome</th>
              <th>+ Detalhes</th>
              <th colspan="2">Ações</th>
            </tr>
          </thead>

          <tbody>
            @if (isset($clientes))
              @foreach ($clientes as $cliente)
                <tr>
                  <td>{{ $cliente->nome }}</td>
                  <td><a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}">Visualizar</a></td>
                  <td>
                    <form id="form_{{$cliente->id}}" name="formDelete" class="form-inline" action="{{ route('cliente.destroy', $cliente->id)}}" method="post">
                      @csrf
                      @method("DELETE")

                      {{-- <button class="btnExcluir" type="submit">Excluir</button> --}}
                    </form>
                    <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()" class="inlineA" href="{{ route('cliente.edit', $cliente->id)}}">Excluir | </a>
                    <a class="inlineA" href="{{ route('cliente.edit', $cliente->id)}}">Editar</a>
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
        <br>
        {{ $clientes->appends($request)->links() }}
        <br><br>
        {{ $clientes->count() }} Total de registros por página.
        <br><br>
        {{ $clientes->firstItem() }} Número do primeiro registro da página
        <br><br>
        {{ $clientes->lastItem() }} Número do último registro da página
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
