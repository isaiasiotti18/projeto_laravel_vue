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
              <th>Peso</th>
              <th>Unidade</th>
              <th>Excluir</th>
              <th>Editar</th>
            </tr>
          </thead>

          <tbody>
            @if (isset($produtos))
              @foreach ($produtos as $produto)
                <tr>
                  <td>{{ $produto->nome }}</td>
                  <td>{{ $produto->descricao }}</td>
                  <td>{{ $produto->peso }}</td>
                  <td>{{ $produto->unidade_id }}</td>
                  {{-- <td><a href="{{ route('app.produto.destroy', $fornecedor->id)}}">Excluir</a></td>
                  <td><a href="{{ route('app.produto.edit', $fornecedor->id)}}">Editar</a></td> --}}
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
@endsection