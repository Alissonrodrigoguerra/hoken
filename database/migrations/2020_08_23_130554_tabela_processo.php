<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelaProcesso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Processos', function (Blueprint $table) {
            
            $table->id();
            $table->timestamps();
            $table->string('name', 255);
            $table->integer('Produto_id');
            $table->string('imagem_destaque', 255);
            $table->string('imagem', 255);
            $table->text('titulo');
            $table->integer('status_log')->unsigned()->nullable();
      

    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

