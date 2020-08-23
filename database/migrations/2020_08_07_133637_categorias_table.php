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
        $table->longText('categoria_description')->nullable()->default('text');
        $table->string('name', 255)->nullable()->default('text');
        $table->string('type')->nullable()->default('text');
        $table->string('imagem_backgound', 255)->nullable()->default('text');
        $table->string('imagem_destaque', 255)->nullable()->default('text');
        $table->string('imagem_icon', 255)->nullable()->default('text');
        $table->text('categoria_title')->nullable()->default('text');
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
        Schema::dropIfExists('categorias');

    }
}
