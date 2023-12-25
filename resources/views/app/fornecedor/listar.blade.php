@extends('layouts.basic_app')

@section('conteudo')
  <div class="conteudo-pagina">

    <div class="titulo-pagina-2">
      <p>Fornecedor - Listar</p>
    </div>

    <div class="menu">
      <ul>
        <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
        <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
      </ul>
    </div>

    <div class="informacao-pagina">
      <div style="width: 90%; margin-left: auto; margin-right: auto;">
        <table border="1" width="100%">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Site</th>
              <th>UF</th>
              <th>E-mail</th>
              <th colspan="2">Ações</th>
            </tr>
          </thead>

          <tbody>
            @if (isset($fornecedores))
              @foreach ($fornecedores as $fornecedor)
                <tr>
                  <td>{{ $fornecedor->nome }}</td>
                  <td>{{ $fornecedor->site }}</td>
                  <td>{{ $fornecedor->uf }}</td>
                  <td>{{ $fornecedor->email }}</td>
                  <td><a href="{{ route('app.fornecedor.excluir', $fornecedor->id)}}">Excluir</a></td>
                  <td><a href="{{ route('app.fornecedor.editar', $fornecedor->id)}}">Editar</a></td>
                </tr>

                <tr>
                  <td align="center" colspan="6">
                    <p>Lista de produtos</p>
                    <table border="1" @style(["margin:20px;"])>
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nome</th>
                          <th>Descrição</th>
                          <th>Peso</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($fornecedor->produtos as $produto)
                          <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->descricao }}</td>
                            <td>{{ $produto->peso }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
        <br>
        {{ $fornecedores->appends($request)->links() }}
        <br>
        {{ $fornecedores->count() }} Total de registros por página.
        <br>
        {{ $fornecedores->firstItem() }} Número do primeiro registro da página
        <br>
        {{ $fornecedores->lastItem() }} Número do último registro da página
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
    td, tr, th {
      padding: 5px;
    }
  </style>
@endsection
