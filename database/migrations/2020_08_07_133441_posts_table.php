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
        $table->date('post_data')->nullable();	
        $table->longText('post_content')->nullable()->default('text');
        $table->text('post_title')->nullable()->default('text');
        $table->text('post_status')->nullable()->default('text');
        $table->text('comment_status')->nullable()->default('text');
        $table->text('categoria_id')->nullable()->default('text');
        $table->text('post_tag')->nullable()->default('text');
        $table->string('post_imagem', 100)->nullable()->default('text');
        $table->integer('status_log')->unsigned()->nullable();
        $table->timestamp('updated_at')->nullable();	
        $table->timestamp('created_at')->nullable();

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
    }
}
