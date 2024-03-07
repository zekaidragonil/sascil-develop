<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TraspasoAnalista extends Migration
{

    public function up()
    {
        schema::create('traspaso_has_analista',function(Blueprint $table){
            $table->integer('id_traspaso')->references('id')->on('traspaso')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_usuario')->references('id')->on('usuario')->onDelete('cascade')->onUpdate('cascade');
            $table->datetime('fecha_asignada');
            $table->datetime('fecha_respuesta');
            $table->timestamps();
        });
    }

    public function down()
    {
        schema::drop('traspaso_has_analista');
    }
}
