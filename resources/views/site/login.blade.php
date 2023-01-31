@extends('site.layouts.basico')

@section('titulo', $titulo)
<style>
    .formulario{
        background-color: white;
        color: black;
        display: flex;
        flex-direction: column;
        margin-top: 5rem;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        margin: 5rem;
        padding: 10rem;
    }
    .item-formulario{
        margin: 0rem 30rem;
    }
    .item-formulario input{
        border: 1px solid black;
    }
</style>

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>LOGIN</h1>
        </div>
            
            <form action={{ route('site.login') }} method="post">
                @csrf
                <div class="formulario">
                    <div class="item-formulario">
                        <input type="text" value='{{ old('usuario') }}' name="usuario" id='usuario' placeholder="Usuario">
                        {{ $errors->has('usuario') ? $errors->first('usuario') : '' }}
                    </div>
                    <div class="item-formulario">
                        <input type="password" value='{{ old('senha') }}' name="senha" id='senha' placeholder="Senha">
                        {{ $errors->has('senha') ? $errors->first('senha') : '' }}
                    </div>
                    <div class="item-formulario">
                        <button type="submit" id='botaoAcessar'>Acessar</button>
                    </div>
                </div>
                
            </form>
            {{ isset($error) && $error != '' ? $error : ''}}
        
    </div>

@endsection