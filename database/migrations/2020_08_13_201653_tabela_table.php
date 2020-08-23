<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabelas', function (Blueprint $table) {
            
            $table->id();
            $table->string('nome');
            $table->integer('posicao')->nullable();
            $table->string('icon')->nullable();
            $table->integer('grupo_tabelas_id')->unsigned();
            $table->integer('status_log');
            $table->integer('update_user');
            $table->timestamps();	

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabelas');
    }
}
