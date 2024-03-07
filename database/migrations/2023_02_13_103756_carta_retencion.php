<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CartaRetencion extends Migration
{

    public function up()
    {
        Schema::create('carta_retencion',function(Blueprint $table){
            $table->increments('id');
            $table->text('carta_retencion');
            $table->integer('id_solicitud')->references('id')->on('solicitud')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_alainza')->references('id')->on('alianza')->onDelete('cascade')->onUpdate('cascade');
            $table->text('observaciones');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('carta_retencion');
    }
}
