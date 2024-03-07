<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PresupuestoTemporal extends Migration
{
    public function up()
    {
        schema::create('presupuesto_temporal',function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_fondo')->references('id')->on('fondo')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_unidad')->references('id')->on('unidad')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_clasificador_presupuestario')->references('id')->on('clasificador_presupuestario')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_proyecto')->references('id')->on('proyecto')->onDelete('cascade')->onUpdate('cascade');
            $table->double('monto');
            $table->string('numero_punto');
        });
    }

    public function down()
    {
        schema::drop('presupuesto_temporal');
    }
}
