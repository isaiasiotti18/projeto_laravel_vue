

{{-- Bloco IF/ELSE --}}
@if (count($fornecedores) > 0)
  <h2>Mais de um fornecedor</h2>
@else
  <h2>Menos de 10 fornecedores</h2>
@endif

{{-- @isset -> Testa a existência de uma variável --}}

{{-- @empty -> verifica se uma variavel esta vazio ou não, se vazio, retorna true --}}
@php
/*
  Valores vazios (Retornará true):
   - ''
   - 0
   - 0.0
   - null
   - false
   - array()
   - $var
*/
@endphp
@empty($fornecedores_honda)
  <h2>Array não possui Fornecedores</h2>
@endempty
