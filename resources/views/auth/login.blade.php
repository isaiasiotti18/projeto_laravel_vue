@extends('site.layouts.basic')

@section('titulo', 'Login')

@section('conteudo')

<div class="conteudo-pagina">
  <div class="titulo-pagina">
    <h1>Login</h1>
  </div>

  <div class="informacao-pagina">
    <form action="{{ route('auth.login.post') }}" method="post">
      @csrf
    </form>
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
