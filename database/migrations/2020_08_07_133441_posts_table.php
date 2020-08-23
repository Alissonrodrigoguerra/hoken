<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostsTable extends Migration
{
    /**
     * Run the migrations.php 
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('posts', function (Blueprint $table) {

        $table->id();
        $table->integer('post_autor');
        $table->integer('destaque')->nullable();
        $table->date('post_data');	
        $table->longText('post_content')->nullable()->default('text');
        $table->text('post_title');
        $table->text('categoria_id')->nullable();
        $table->text('post_tag')->nullable()->default('text');
        $table->string('post_imagem', 255)->nullable()->default('text');
        $table->integer('status_log')->unsigned()->nullable();
        $table->timestamps();	

        });

    }

    /**
     * Reverse the migrations.php
     *
     * @return void
     */
    public function down() 
    {
        //
        Schema::dropIfExists('posts');

    }
}
