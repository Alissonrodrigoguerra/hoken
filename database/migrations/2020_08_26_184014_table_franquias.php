<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableFranquias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('franquias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome', 255);
            $table->string('codigo', 255);
            $table->string('Rua', 255);
            $table->string('Numero', 255);
            $table->string('Bairro', 255);
            $table->string('CEP', 255);
            $table->string('Whatsapp', 255);
            $table->string('Telefone', 255);
            $table->string('E-mail', 255);
            $table->longtext('referencia')->nullable();
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
        Schema::dropIfExists('franquias');
    }
}
