<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('site_contatos')->insert([
            'nome' =>'Sistema', 
            'telefone' =>'(28)99768500', 
            'email' =>'sistema@contato.com.br',
            'motivo'=>'1', 
            'mensagem'=>'Seja bem vindo ao sistema', 
        ]);
    }
}
