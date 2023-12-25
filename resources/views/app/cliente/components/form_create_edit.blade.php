@if (isset($cliente->id))
  <form action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}" method="POST">
    @csrf
    @method('PUT')
  @else
    <form action="{{ route('cliente.store') }}" method="post">
      @csrf
@endif

  <input type="hidden" name="id" value="{{ $cliente->id ?? '' }}">

  <input class="borda-preta" type="text" name="nome" value="{{ $cliente->nome ?? old('nome') }}" id="nome"
    placeholder="Nome do Cliente">
  {{ $errors->has('nome') ? $errors->first('nome') : '' }}

  <button type="submit" class="borda-preta">Cadastrar</button>
</form>
