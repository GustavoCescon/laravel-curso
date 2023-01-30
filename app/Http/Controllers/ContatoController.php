<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
class ContatoController extends Controller
{
    public function contato(Request $request){
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

        // print_r($contato->getAttributes());
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
        // $contato->fill($request->all());
        // $contato->save();


        /**
         * OUTRA MANEIRA FÁCIL DE SALVAR NO BANCO
         */
        $contato = new SiteContato();
        $contato->create($request->all());

        return view('site.contato', ['titulo'=>'Super Gestão - Contato']);
    }
}
 