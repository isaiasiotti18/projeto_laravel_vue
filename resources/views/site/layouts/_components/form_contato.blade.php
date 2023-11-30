{{ $slot }}
<form action="{{ route('site.contato') }}" method="POST">
  @csrf
  <input type="text" value="{{ old('nome') }}" placeholder="Nome" name="nome" class="borda-preta">
  <br>
  <input type="text" value="{{ old('telefone') }}" placeholder="Telefone" name="telefone" class="borda-preta">
  <br>
  <input type="text" value="{{ old('email') }}" placeholder="E-mail" name="email" class="borda-preta">
  <br>
  <select name="motivo_contato" class="borda-preta">
    <option disabled selected value="0">Qual o motivo do contato?</option>
    @foreach($motivo_contatos as $key => $motivo_contato)
      <option value="{{$motivo_contato->id}}" {{ old('motivo_contato') == $motivo_contato->id ? 'selected' : '' }}>{{$motivo_contato->motivo_contato}}</option>
    @endforeach
  </select>
  <br>
  <textarea name="mensagem" class="borda-preta" placeholder="Preencha aqui a sua mensagem">{{ ( old('mensagem') != '') ? old('mensagem') : '' }}</textarea>
  <br>
  <button type="submit" class="borda-preta">ENVIAR</button>
</form>
