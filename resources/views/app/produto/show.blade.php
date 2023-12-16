@extends('layouts.basic_app')

@section('conteudo')
  <div class="conteudo-pagina">

    <div class="titulo-pagina-2">
      <h2>{{ $produto->nome }}</h2>
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
        <table border="1" @style([
          'text-align: left',
        ])>
          <tr>
            <td>ID: </td>
            <td>{{ $produto->id }}</td>
          </tr>

          <tr>
            <td>Nome: </td>
            <td>{{ $produto->nome }}</td>
          </tr>

          <tr>
            <td>Descrição: </td>
            <td>{{ $produto->descricao }}</td>
          </tr>

          <tr>
            <td>Peso: </td>
            <td>{{ $produto->peso }}</td>
          </tr>

          <tr>
            <td>Unidade: </td>
            <td>{{ $produto->unidade_id }}</td>
          </tr>
        </table>
      </div>

    </div>

  </div>

  <style>
    tr {
      padding: 5px;
    }

    td {
      padding: 5px;
    }
  </style>
@endsection
