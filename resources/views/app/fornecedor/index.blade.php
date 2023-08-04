<h3>Fornecedor</h3>
<p>Aqui é a página do fornecedor</p>

@if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem vários fornecedores cadastrados</h3>
@else
    <h3>Não existem fornecedores cadastrados</h3>
@endif

@isset($fornecedores)
    <hr>
    @forelse($fornecedores as $indice => $fornecedor)
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'CNPJ não informado!'}}
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? ''}}) {{ $fornecedor['telefone'] }}
        <br>
        @switch($fornecedor['ddd'])
            @case('11')
                São Paulo - SP
                @break
            @case('85')
                Fortaleza - CE
                @break
            @case('32')
                Juiz de Fora - MG
                @break
            @default
                Estado não identificado
        @endswitch
        <hr>
    @empty
        Não existem fornecedores cadastrados!
    @endforelse
@endisset

{{-- @for($i = 0; $i < count($fornecedores); $i++)
@endfor --}}

{{-- Caso o campo 'cnpj' do array não existir ou tiver valor null --> usa default --}}
{{-- Fornecedor: {{ $fornecedores[0]['nome'] }}
<br>

Status: {{ $fornecedores[0]['status'] }}
<br> --}}

{{-- @isset($fornecedores)
    Fornecedor: {{ $fornecedores[0]['nome'] }}
    <br>
    Status: {{ $fornecedores[0]['status'] }}
    <br>
    @isset($fornecedores[0]['cnpj'])
        CNPJ: {{ $fornecedores[0]['cnpj'] }}
        @empty($fornecedores[0]['cnpj'])
            - Vazio
        @endempty
    @endisset
@endisset --}}

{{-- 
@if(!($fornecedores[0]['status'] == 'S'))
    <h3>Fornecedor Inativo</h3>
@endif

@unless($fornecedores[0]['status'] == 'S')
    <h3>Fornecedor Inativo</h3>
@endunless --}}

{{-- @dd($fornecedores) --}}

{{-- 
    1 - @dd() serve para imprimir arrays 
    2 - @isset() serve para saber se uma variável ou campo de array está setado
    3 - @if()/@elseif() --> apenas o if/else normal
    4 - @unless() --> executa quando é falso
    5 - @empty() vale True quando '', 0, 0.0, '0', null, false, array(), $var declarada, mas não inicializada.
--}}
{{-- Aqui pode colocar o comentário, será descartado pelo Blade --}}