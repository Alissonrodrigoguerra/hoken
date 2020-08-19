<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelaGrupoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabela_grupo', function (Blueprint $table) {
            $table->id();
            $table->string('tabela_grupo_nome');
            $table->integer('tabela_grupo_position')->nullable();
            $table->integer('status_log');
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
        Schema::dropIfExists('tabela_grupo');
    }
}
