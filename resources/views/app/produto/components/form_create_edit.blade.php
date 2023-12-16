@if (isset($produto->id))
  <form action="{{ route('produto.update', ['produto' => $produto->id]) }}" method="POST">
    @csrf
    @method('PUT')
  @else
    <form action="{{ route('produto.store') }}" method="post">
      @csrf
@endif

  <input type="hidden" name="id" value="{{ $fornecedor->id ?? '' }}">

  <input class="borda-preta" type="text" name="nome" value="{{ $produto->nome ?? old('nome') }}" id="nome"
    placeholder="Nome do produto">
  {{ $errors->has('nome') ? $errors->first('nome') : '' }}

  <input class="borda-preta" type="text" name="descricao" value="{{ $produto->descricao ?? old('descricao') }}"
    id="descricao" placeholder="Descreva o produto">
  {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

  <input class="borda-preta" type="text" name="peso" value="{{ $produto->peso ?? old('peso') }}" id="peso"
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
