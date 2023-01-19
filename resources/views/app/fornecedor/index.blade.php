<h3>FORNECEDOR</h3>

{{-- FICA O COMENTARIO QUE SERA DESCARTADO PELO INTERPRETADOR DO BLADE --}}

@php 
    //comentario navito do PHP
    /*OUTRO COMENTARIO NATIVO DO PHP*/

    /* if(){

    }else if(){

    }else{

    } */
@endphp

{{-- @dd($fornecedores) --}}

{{-- @if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem varios fornecedores cadastrados</h3>
@else
    <h3>Ainda não existem fornecedores cadastrados</h3>
@endif --}}

@isset($fornecedores)
    Fornecedor: {{$fornecedores[0]['nome']}}
    <br>
    Status: {{$fornecedores[0]['status']}}
    <br>
    @isset($fornecedores[0]['cnpj'])
        CNPJ: {{$fornecedores[0]['cnpj']}}
        <br>
    @endisset
    @if( !($fornecedores[0]['status'] == 'S') )
        Fornecedor Inativo
    @endif
    <br>
    {{-- UNLESS NEGA A CONDIÇÃO --}}
    @unless($fornecedores[0]['status'] == 'S')
        Fornecedor Inativo
    @endunless

@endisset