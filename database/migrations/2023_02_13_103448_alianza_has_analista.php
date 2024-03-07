<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlianzaHasAnalista extends Migration
{

    public function up()
    {
        Schema::create('alianza_has_analista',function(Blueprint $table){
            $table->integer('id_usuario')->references('id')->on('usuario')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_alianza')->references('id')->on('alianza')->onDelete('cascade')->onUpdate('cascade');
            $table->date('fecha_asignado');
            $table->date('fecha_respuesta');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('alianza_has_analistas');
    }
}
