@extends('layouts.basic')

@section('titulo', 'Principal')

@section('conteudo')

<div class="conteudo-destaque">

  <div class="esquerda">
    <div class="informacoes">
      <h1>Sistema Super Gestão</h1>
      <p>Software para gestão empresarial ideal para sua empresa.
      <p>
      <div class="chamada">
        <img src="{{ asset('images/check.png') }}">
        <span class="texto-branco">Gestão completa e descomplicada</span>
      </div>
      <div class="chamada">
        <img src="{{ asset('images/check.png') }}">
        <span class="texto-branco">Sua empresa na nuvem</span>
      </div>
    </div>

    <div class="video">
      <img src="{{ asset('images/player_video.jpg') }}">
    </div>
  </div>

  <div class="direita">
    <div class="contato">
      <h1>Contato</h1>
      <p>Caso tenha qualquer dúvida por favor entre em contato com nossa equipe pelo formulário abaixo.</p>
      @component('layouts._components.form_contato', ['motivo_contatos' => $motivo_contatos])
        <p>A nossa equipe analisará sua mensagem e retornaremos o mais breve possível.</p>
        <p>Tempo médio de resposta: 48h</p>
      @endcomponent
    </div>
  </div>
</div>
@endsection
