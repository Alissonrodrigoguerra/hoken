<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcessoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acesso_table', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tabela_grupo')->unsigned();
            $table->foreign('id_tabela_grupo')->references('id')->on('tabela_grupo');
            $table->integer('id_cargo')->unsigned();
            $table->foreign('id_cargo')->references('id')->on('cargo');
            $table->integer('id_acoes')->unsigned();
            $table->foreign('id_acoes')->references('id')->on('acoes');
            $table->integer('update_user');
            $table->timestamp('data_atualizacao')->nullable();
            $table->timestamp('data_criacao')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acesso_tabela');
    }
}
