@extends('layouts.basic_app')

@section('conteudo')
  <div class="conteudo-pagina">

    <div class="titulo-pagina-2">
      <p>Fornecedor - Adicionar</p>
    </div>

    <div class="menu">
      <ul>
        <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
        <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
      </ul>
    </div>
    <div class="informacao-pagina">

      <div style="width: 30%; margin-left: auto; margin-right: auto;">
        <form action="{{ route('app.fornecedor.adicionar') }}" method="post">
          @csrf
          <input class="borda-preta" type="text" name="nome" value="{{ old('nome') }}" id="nome" placeholder="Nome / Razão Social">
          {{ $errors->has('nome') ? $errors->first('nome') : '' }}

          <input class="borda-preta" type="text" name="site" value="{{ old('site') }}" id="site" placeholder="Site">
          {{ $errors->has('site') ? $errors->first('site') : '' }}

          <input class="borda-preta" type="text" name="uf" value="{{ old('uf') }}" id="uf" placeholder="UF de Origem">
          {{ $errors->has('uf') ? $errors->first('uf') : '' }}

          <input class="borda-preta" type="text" name="email" value="{{ old('email') }}" id="email" placeholder="Email p/ contato">
          {{ $errors->has('email') ? $errors->first('email') : '' }}

          <button type="submit" class="borda-preta">Adicionar</button>
        </form>
      </div>

    </div>

  </div>
@endsection
