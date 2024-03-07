<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CertificacionPresupuestariaAnalista extends Migration
{

    public function up()
    {
        Schema::create('certificacion_presupuestaria_analista',function(Blueprint $table){
            $table->integer('id_certificacion_presupuestaria')->references('id')->on('certificacion_presupuestaria')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_usuario')->references('id')->on('usuario')->onDelete('cascade')->onUpdate('cascade');
            $table->datetime('fecha_asignado');
            $table->datetime('fecha_respuesta');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('certificacion_presupuestaria_analista');
    }
}
