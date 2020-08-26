<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableManual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manual', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome', 255);
            $table->integer('Produto_id');
            $table->string('arquivo', 255)->nullable();
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
        Schema::dropIfExists('manual');
    }
}
