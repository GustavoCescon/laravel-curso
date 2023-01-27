<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;


class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instanciando o objeto
        /* $fornecedor = new Fornecedor();
        $fornecedor->nome='Fornecedor teste';
        $fornecedor->site='fornecedorteste@gmail.com';
        $fornecedor->uf='ES';
        $fornecedor->email='fornecedorteste@contato.com.br';
        $fornecedor->save();
        
        //Não esquecer de implementar o atributo fillable na classe
        Fornecedor::create([
            'nome'=>'Bragantino', 
            'site'=>'bragantino.com.br', 
            'uf'=> 'SP', 
            'email'=>'bragantino@contato.com.br',
        ]); */

        DB::table('fornecedores')->insert([
            'nome' =>'flamengo', 
            'site' =>'flamengo.com.br', 
            'uf'=>'RJ', 
            'email' =>'flamengo@contato.com.br',
        ]);
    }
}
