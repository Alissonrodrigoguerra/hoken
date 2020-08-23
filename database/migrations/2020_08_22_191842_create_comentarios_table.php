<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            
            $table->id();
            $table->timestamps();
            $table->date('data')->nullable();	
            $table->longText('comment')->nullable()->default('text');
            $table->string('name', 255);
            $table->string('email', 255);
            $table->integer('post_id');
            $table->integer('status_log')->unsigned()->nullable();
            $table->integer('update_user');
            $table->timestamp('data_atualizacao')->nullable();;	
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
        Schema::dropIfExists('comentarios');
    }
}
