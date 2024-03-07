<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Traspaso extends Migration
{

    public function up()
    {
        schema::create('traspaso',function(Blueprint $table){
            $table->increments('id');
            $table->text('concepto');
            $table->string('partida_origen',45);
            $table->double('monto_origen');
            $table->string('partida_destino');
            $table->double('monto_disponible');
            $table->double('monto_solicitado');
            $table->double('monto_total');
            $table->integer('id_proyecto')->references('id')->on('proyecto')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_unidad')->references('id')->on('unidad')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_proyecto_origen');
            $table->string('estatus');
            $table->timestamps();
        });
    }


    public function down()
    {
        schema::drop('traspaso');
    }
}
