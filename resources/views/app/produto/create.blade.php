@extends('layouts.basic_app')

@section('conteudo')
  <div class="conteudo-pagina">

    <div class="titulo-pagina-2">
      <p>Produto - Create</p>
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
        <form action="{{ route('produto.store') }}" method="post">
          @csrf

          <input type="hidden" name="id" value="{{ $fornecedor->id ?? '' }}">

          <input
            class="borda-preta"
            type="text"
            name="nome"
            value="{{ $produto->nome ?? old('nome') }}"
            id="nome"
            placeholder="Nome do produto">
          {{ $errors->has('nome') ? $errors->first('nome') : '' }}

          <input
            class="borda-preta"
            type="text"
            name="descricao"
            value="{{ $produto->descricao ?? old('descricao') }}"
            id="descricao"
            placeholder="Descreva o produto">
          {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

          <input
            class="borda-preta"
            type="text"
            name="peso"
            value="{{ $produto->peso ?? old('peso') }}"
            id="peso"
            placeholder="Peso">
          {{ $errors->has('peso') ? $errors->first('peso') : '' }}

          <select name="unidade_id">
            <option selected disabled>-- Selecione a Unidade de Medida --</option>
            @foreach ($unidades as $unidade)
              <option value="{{ $unidade->id }}">{{ $unidade->descricao }}</option>
            @endforeach
          </select>
          {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

          <button type="submit" class="borda-preta">Adicionar</button>
        </form>
      </div>

    </div>

  </div>
@endsection
