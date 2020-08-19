<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabela_table', function (Blueprint $table) {
            
            $table->id();
            $table->string('table_nome');
            $table->integer('table_position')->nullable();
            $table->string('table_icon')->nullable();
            $table->integer('id_tabela_grupo')->unsigned;
            $table->integer('status_log');
            $table->integer('update_user');
            $table->timestamp('data_atualizacao')->nullable();	
            $table->timestamp('data_criacao')->nullable();
            
            $table->foreign('id_tabela_grupo')->references('id')->on('tabela_grupo');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tablela_tale');
    }
}
