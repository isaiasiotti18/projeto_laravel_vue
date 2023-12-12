@extends('layouts.basic_app')

@section('conteudo')
  <div class="conteudo-pagina">

    <div class="titulo-pagina-2">
      <p>Fornecedor</p>
    </div>

    <div class="menu">
      <ul>
        <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
        <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
      </ul>
    </div>

    <div class="informacao-pagina">

      <div style="width: 30%; margin-left: auto; margin-right: auto;">
        <form action="{{ route('app.fornecedor.listar') }}" method="post">
          @csrf
          <input class="borda-preta" type="text" name="nome" id="nome" placeholder="Nome / Razão Social">
          <input class="borda-preta" type="text" name="site" id="site" placeholder="Site">
          <input class="borda-preta" type="text" name="uf" id="uf" placeholder="UF">
          <input class="borda-preta" type="text" name="email" id="email" placeholder="E-mail">

          <button type="submit" class="borda-preta">Pesquisar</button>
        </form>
      </div>

    </div>

  </div>
@endsection
