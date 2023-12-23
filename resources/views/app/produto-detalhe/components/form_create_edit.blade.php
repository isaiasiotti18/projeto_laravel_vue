@if (isset($produto_detalhe->id))
  <form action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}" method="POST">
    @csrf
    @method('PUT')
  @else
    <form action="{{ route('produto-detalhe.store') }}" method="post">
      @csrf
@endif

  <input
    class="borda-preta"
    type="text"
    name="comprimento"
    value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}"
    id="comprimento"
    placeholder="comprimento"
  >
  {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}

  <input
    class="borda-preta"
    type="text"
    name="largura"
    value="{{ $produto_detalhe->largura ?? old('largura') }}"
    id="largura"
    placeholder="largura"
  >
  {{ $errors->has('largura') ? $errors->first('largura') : '' }}

  <input
    class="borda-preta"
    type="text"
    name="altura"
    value="{{ $produto_detalhe->altura ?? old('altura') }}"
    id="altura"
    placeholder="altura"
  >
  {{ $errors->has('altura') ? $errors->first('altura') : '' }}

  <select name="unidade_id">
    <option selected disabled>-- Selecione a Unidade de Medida --</option>
    @foreach ($unidades as $unidade)
      <option value="{{ $unidade->id }}">{{ $unidade->descricao }}</option>
    @endforeach
  </select>
  {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

  <button type="submit" class="borda-preta">Adicionar</button>
</form>


