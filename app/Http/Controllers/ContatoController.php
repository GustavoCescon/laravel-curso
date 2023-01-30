<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(){
        /* echo "<pre>";
        print_r($request->all());
        echo "</pre>";
        echo $request->input('nome'); */
        /**
         * UTILIZAR ESSE METODO QUANDO QUISER FAZER ALGUM TRATAMENTO
         */
        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo = $request->input('motivo');
        // $contato->mensagem = $request->input('mensagem');
        // $contato->save();

        /**
         * OUTRA FORMA DE SALVAR OS DADOS NO BANCO DE DADOS DE MANEIRA RÁPIDA E PRATICA
         */
        // $contato = new SiteContato();
        // $contato->fill($request->all());
        // $contato->save();


        /**
         * OUTRA MANEIRA FÁCIL DE SALVAR NO BANCO
         */
        // $contato = new SiteContato();
        // $contato->create($request->all());

        $motivo_contato = MotivoContato::all();

        return view('site.contato', ['titulo'=>'Super Gestão - Contato', 'motivo_contato'=>$motivo_contato]);
    }

    public function salvar(Request $request)
    {   
        /**
         * VALIDANDO OS DADOS VINDO DO FORMULARIO
         */
        $regras =
        [
            'nome' => 'required|min:3|max:40|unique:site_contatos', //nomes com no minimo 3 caracteres e no maximo 40  
            'telefone' => 'required',
            'email' => 'email', 
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];
        $feedback = [
            //mensagens de feedback personalizadas
            'nome.required' => 'O campo nome precisa ser preenchido',
            'nome.min'=> 'O nome deve ter pelo menos 3 caracteres.',
            'nome.max'=> 'O nome não deve ter mais de 40 caracteres.',
            'nome.unique'=> 'O nome informado já está em uso',
            'telefone.required' => 'O campo telefone precisa ser preenchido',
            'email.email' => 'Insira um email válido',
            'motivo_contatos_id.required' => 'O campo motivo precisa ser preenchido',
            'mensagem.required' => 'O campo mensagem precisa ser preenchido',
            'mensagem.max' => 'A mensagem não deve ter mais de 2000 caracteres',

            //mensagem generica de acordo com o campo
            'required' => 'O campo :attribute deve ser preenchido', //:attribute para buscar o campo que está sendo validado
            'email' => 'O email informado não é valido'
        ];
        $request->validate($regras, $feedback );
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
 