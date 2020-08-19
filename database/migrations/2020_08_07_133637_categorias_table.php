<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //   
        Schema::create('categorias', function (Blueprint $table) {

        $table->id();
        $table->string('categoria_autor');
        $table->datetime('categoria_data')->nullable();	
        $table->longText('categoria_content')->nullable()->default('text');
        $table->text('categoria_title')->nullable()->default('text');
        $table->integer('status_log')->unsigned()->nullable();
        $table->timestamp('updated_at')->nullable();	
        $table->timestamp('created_at')->nullable();

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
    }
}
