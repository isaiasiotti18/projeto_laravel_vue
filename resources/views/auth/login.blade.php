@extends('layouts.basic')

@section('titulo', 'Login')

@section('conteudo')

<div class="conteudo-pagina">
  <div class="titulo-pagina">
    <h1 style="">Login</h1>
  </div>

  <div class="informacao-pagina">
    <div style="width: 30%; margin-left: auto; margin-right: auto;">
      <form action="{{ route('auth.login') }}" method="post">
        @csrf
        <input type="text" name="email" value="{{ old('email')}}" id="" placeholder="Usuário" class="borda-preta"/>
        {{ $errors->has('email') ? $errors->first('email') : '' }}

        <input type="password" name="password" value="{{ old('password')}}" id="" placeholder="password" class="borda-preta"/>
        {{ $errors->has('password') ? $errors->first('password') : '' }}

        <button type="submit" class="borda-preta">
          Acessar
        </button>
      </form>
      <br>
      {{ isset($erro) && $erro != '' ? $erro : '' }}
    </div>
  </div>
</div>

<div class="rodape">
  <div class="redes-sociais">
    <h2>Redes sociais</h2>
    <img src="{{ asset('images/facebook.png') }}">
    <img src="{{ asset('images/linkedin.png') }}">
    <img src="{{ asset('images/youtube.png') }}">
  </div>
  <div class="area-contato">
    <h2>Contato</h2>
    <span>(11) 3333-4444</span>
    <br>
    <span>supergestao@dominio.com.br</span>
  </div>
  <div class="localizacao">
    <h2>Localização</h2>
    <img src="{{ asset('images/mapa.png') }}">
  </div>
</div>
@endsection
