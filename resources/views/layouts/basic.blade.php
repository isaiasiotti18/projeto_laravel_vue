<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <title>Super Gestão - @yield('titulo')</title>
    <meta charset="utf-8">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body>
    @include('layouts._partials.navbar')
    @yield('conteudo')
  </body>

</html>
