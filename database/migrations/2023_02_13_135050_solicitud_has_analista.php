<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SolicitudHasAnalista extends Migration
{

    public function up()
    {
        schema::create('solicitud_has_analista',function(Blueprint $table){
            $table->integer('id_solicitud')->references('id')->on('solicitud')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_usuario')->references('id')->on('usuario')->onDelete('cascade')->onUpdate('cascade');
            $table->datetime('fecha_asignado');
            $table->datetime('fecha_respuesta');
            $table->integer('id_estatus')->references('id')->on('estatus')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('verificado');
            $table->timestamps();
        });
    }

    public function down()
    {
        schema::drop('solicitud_has_analista');
    }
}
