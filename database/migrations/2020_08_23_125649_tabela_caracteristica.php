<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelaCaracteristica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Caracteristicas', function (Blueprint $table) {
            
            $table->id();
            $table->string('name', 255);
            $table->integer('Produto_id');
            $table->text('valor');
            $table->integer('destaque');
            $table->string('destaque_imagem', 255);
            $table->integer('status_log')->unsigned()->nullable();
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
        //
        Schema::dropIfExists('Caracteristicas');

    }
}
