
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarBannerTable extends Migration
{
    /**
     * Run the migrations.php 
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Banners', function (Blueprint $table) {

        $table->id();
        $table->integer('Banner_autor');
        $table->date('Banner_data')->nullable();	
        $table->longText('Banner_subtitle')->nullable()->default('text');
        $table->text('Banner_title')->nullable()->default('text');
        $table->text('Banner_link')->nullable()->default('text');
        $table->text('slider_id')->nullable()->default('text');
        $table->string('Banner_imagem', 100)->nullable()->default('text');
        $table->integer('status_log')->unsigned()->nullable();
        $table->integer('update_user');
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
        Schema::dropIfExists('Banners');

    }
}



