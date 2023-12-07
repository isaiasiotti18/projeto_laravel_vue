<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <title>Super Gestão - @yield('titulo')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>

  <body>
    @include('layouts._partials.navbar')
    @yield('conteudo')
  </body>

</html>
