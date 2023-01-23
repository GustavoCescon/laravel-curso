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

{{--
    
@isset($fornecedores)
    Fornecedor: {{$fornecedores[0]['nome']}}
    <br>
    Status: {{$fornecedores[0]['status']}}
    <br>
    @isset($fornecedores[0]['cnpj'])
        CNPJ: {{$fornecedores[0]['cnpj']}}
        <br>
    @endisset
    @empty($fornecedores[0]['cnpj'])
        Vazio
        <br>
    @endempty
    @if( !($fornecedores[0]['status'] == 'S') )
        Fornecedor Inativo
    @endif
    <br>
  
    @unless($fornecedores[0]['status'] == 'S')
        Fornecedor Inativo
    @endunless

@endisset
--}}


{{-- @isset($fornecedores)
    Fornecedor: {{$fornecedores[0]['nome']}}
    <br>
    Status: {{$fornecedores[0]['status']}}
    <br>
    CNPJ: {{$fornecedores[0]['cnpj'] ?? 'Dado não existe'}}
    <br>
    Tel: ({{$fornecedores[0]['ddd'] ?? ''}}) {{$fornecedores[0]['telefone'] ?? ''}}
    @switch($fornecedores[0]['ddd'])
        @case('22')
            RJ
            @break
        @case('27')
            ES
            @break
        @case('28')
            ES
            @break
        @default
            Estado não identificado
    @endswitch
@endisset --}}

<br>
<br>
<h3>UTILIZANDO O FOR BLADE</h3>
<hr>
@for ( $i=0 ; $i< count($fornecedores) ; $i++)
    
    Fornecedor:{{$fornecedores[$i]['nome'] ?? 'Nome não informado'}}<br>
    Status:{{$fornecedores[$i]['status'] ?? 'Nome não informado'}}<br>
    CNPJ:{{$fornecedores[$i]['cnpj'] ?? 'Nome não informado'}}<br>
    Tel: ({{$fornecedores[$i]['ddd'] ?? ''}}) {{$fornecedores[0]['telefone'] ?? ''}}
    <hr>
@endfor

<br>
<h3>UTILIZANDO O WHILE BLADE</h3>
<hr>
@isset($fornecedores)
    @php $i=0 @endphp
    @while (isset($fornecedores[$i]))
    
    Fornecedor:{{$fornecedores[$i]['nome'] ?? 'Nome não informado'}}<br>
    Status:{{$fornecedores[$i]['status'] ?? 'Nome não informado'}}<br>
    CNPJ:{{$fornecedores[$i]['cnpj'] ?? 'Nome não informado'}}<br>
    Tel: ({{$fornecedores[$i]['ddd'] ?? ''}}) {{$fornecedores[0]['telefone'] ?? ''}}
    <hr>
    @php $i++ @endphp

    @endwhile
@endisset

<br>
<h3>UTILIZANDO O FOREACH BLADE</h3>
<hr>
@isset($fornecedores)
    @foreach ($fornecedores as $i => $fornecedor)
        Fornecedor:{{$fornecedor['nome'] ?? 'Nome não informado'}}<br>
        Status:{{$fornecedor['status'] ?? 'Nome não informado'}}<br>
        CNPJ:{{$fornecedor['cnpj'] ?? 'Nome não informado'}}<br>
        Tel: ({{$fornecedor['ddd'] ?? ''}}) {{$fornecedor['telefone'] ?? ''}}
        <hr>
    @endforeach

@endisset

<br>
<h3>UTILIZANDO O FORELSE BLADE</h3>
<hr>

@isset($fornecedores)
    @forelse ($fornecedores as $i => $fornecedor)
        Interação atual: {{ $loop->iteration }}
        <br>
        Fornecedor: @{{$fornecedor['nome'] ?? 'Nome não informado'}}<br>
        Status:{{$fornecedor['status'] ?? 'Nome não informado'}}<br>
        CNPJ:{{$fornecedor['cnpj'] ?? 'Nome não informado'}}<br>
        Tel: ({{$fornecedor['ddd'] ?? ''}}) {{$fornecedor['telefone'] ?? ''}}
        <br>
        @if($loop->first)
            Primeira iteração do Loop
        @endif
        @if($loop->last)
            última iteração do Loop
            <br>
            Total de registros {{ $loop->count }}
        @endif
        <hr>
        @empty
            Não existe fornecedores cadastrados !!
    @endforelse

@endisset
