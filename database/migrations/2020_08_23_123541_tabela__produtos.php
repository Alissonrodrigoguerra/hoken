<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelaProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Produtos', function (Blueprint $table) {

            $table->id();
            $table->string('name', 255);
            $table->integer('categoria_id');
            $table->string('imagem_destaque', 255);
            $table->string('imagem_backgound', 255);
            $table->string('link', 255);
            $table->string('Video_link', 255);
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
        Schema::dropIfExists('Produtos');

    }
}
