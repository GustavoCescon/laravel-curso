<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //adicionando coluna motivo contado id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        //atribuindo motivo contato para a nova coluna motivo contatos id
        DB::statement('update site_contatos set motivo_contatos_id = motivo');

        //criação da FK e removendo a coluna motivo_contato
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        //criar a coluna motivo contato e removendo fk
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->interger('motivo');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });

        //atribuindo motivo contatos id para a nova coluna motivo contatos
        DB::statement('update site_contatos set motivo = motivo_contatos_id');

        //removendo coluna motivo contado id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });
    }
};
