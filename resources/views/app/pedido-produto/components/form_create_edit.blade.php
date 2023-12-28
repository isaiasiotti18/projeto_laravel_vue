<form action="{{ route('pedido-produto.store', ['pedido' => $pedido]) }}" method="post">
  @csrf

  <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">

  <select name="produto_id">
    <option selected disabled>-- Selecione um Produto --</option>
    @foreach ($produtos as $produto)
      <option value="{{ $produto->id }}"
        {{ old('produto_id') == $produto->id ? 'selected' : '' }}>{{ $produto->nome }}
      </option>
    @endforeach
  </select>
  {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

  <input
    type="number"
    name="quantidade"
    min="1"
    max="999"
    value="{{ old('quantidade') ? old('quantidade') : '' }}"
  >
  {{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}

  <button type="submit" class="borda-preta">Cadastrar</button>
</form>
