<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Presupuesto extends Migration
{

    public function up()
    {
        schema::create('presupuesto',function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_fondo')->references('id')->on('fondo')->onDelete('cascade')->onUpdate('cascade');
            $table->double('monto');
            $table->double('pre_comprometido');
            $table->double('comprometido');
            $table->double('causado');
            $table->double('saldo_disponible');
            $table->integer('id_proyecto')->references('id')->on('proyecto')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_unidad')->references('id')->on('fondo')->onDelete('cascade')->onUpdate('cascade');
            $table->double('id_clasificador_presupuestario')->references('id')->on('clasificador_presupuestario')->onDelete('cascade')->onUpdate('cascade');
            $table->string('fecha_presupuesto',4);
            $table->timestamps();
        });
    }

    public function down()
    {
        schema::drop('presupuesto');
    }
}
