<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SolicitudHasGerente extends Migration
{

    public function up()
    {
        schema::create('solicitud_has_gerente',function(Blueprint $table){
            $table->integer('id_solicitud')->references('id')->on('solicitud')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_usuario')->references('id')->on('usuario')->onDelete('cascade')->onUpdate('cascade');
            $table->datetime('fecha_asignada');
            $table->datetime('fecha_re_asignado');
            $table->timestamps();
        });
    }


    public function down()
    {
        schema::drop('solicitud_has_gerente');
    }
}
