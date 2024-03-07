<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModificacionAnalista extends Migration
{

    public function up()
    {
        schema::create('modificacion_analista',function(Blueprint $table){
            $table->integer('id_usuario')->references('id')->on('usaurio')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_presupuesto_temporal')->references('id')->on('presupuesto_temporal')->onDelete('cascade')->onUpdate('cascade');
            $table->datetime('fecha_asignado');
            $table->datetime('fecha_respuesta');
            $table->timestamps();
        });
    }


    public function down()
    {
        schema::drop('modificacion_analista');
    }
}
