<h3>Fornecedor</h3>
<p>Aqui é a página do fornecedor</p>
{{-- Aqui pode colocar o comentário, será descartado pelo Blade --}}
{{ 'Isso aqui é a mesma coisa que a sintaxe de impressão PHP.' }}
@php
    //Para comentários dentro do PHP
    /*
    Para 
    Várias
    Linhas
    */
@endphp

@if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem vários fornecedores cadastrados</h3>
@else
    <h3>Não existem fornecedores cadastrados</h3>
@endif

Fornecedor: {{ $fornecedores[0]['nome'] }}
<br>

Status: {{ $fornecedores[0]['status'] }}
<br>

@if(!($fornecedores[0]['status'] == 'S'))
    <h3>Fornecedor Inativo</h3>
@endif

@unless($fornecedores[0]['status'] == 'S')
    <h3>Fornecedor Inativo</h3>
@endunless

@dd($fornecedores)