{{ $slot }}
<form action="{{ route('site.contato') }}" method="POST">
  @csrf

  <input type="text" value="{{ old('nome') }}" placeholder="Nome" name="nome" class="borda-preta">
  {{ $errors->has('nome') ? $errors->first('nome') : '' }}

  <br>

  <input type="text" value="{{ old('telefone') }}" placeholder="Telefone" name="telefone" class="borda-preta">
  {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}

  <br>

  <input type="text" value="{{ old('email') }}" placeholder="E-mail" name="email" class="borda-preta">
  {{ $errors->has('email') ? $errors->first('email') : '' }}

  <br>

  <select name="motivo_contato_id" class="borda-preta">
    <option disabled selected value="0">Qual o motivo do contato?</option>
    @foreach($motivo_contatos as $key => $motivo_contato)
      <option value="{{$motivo_contato->id}}" {{ old('motivo_contato_id') == $motivo_contato->id ? 'selected' : '' }}>{{$motivo_contato->motivo_contato}}</option>
    @endforeach
  </select>
  {{ $errors->has('motivo_contato_id') ? $errors->first('motivo_contato_id') : '' }}

  <br>

  <textarea name="mensagem" class="borda-preta" placeholder="Preencha aqui a sua mensagem">{{ ( old('mensagem') != '') ? old('mensagem') : '' }}</textarea>
  {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
  <br>

  <button type="submit" class="borda-preta">ENVIAR</button>
</form>

{{-- @if ($errors->any())
  @foreach ($errors->all() as $error)
    {{ $error }}
    <br>
  @endforeach
@endif --}}
