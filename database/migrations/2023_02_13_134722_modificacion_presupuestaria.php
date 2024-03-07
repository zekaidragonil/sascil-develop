<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModificacionPresupuestaria extends Migration
{
   
    public function up()
    {
        schema::create('modificacion_presupuestaria',function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_fondo')->references('id')->on('fondo')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_clasificador_presupuestario')->references('id')->on('clasificador_presupuestario')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_proyecto')->references('id')->on('proyecto')->onDelete('cascade')->onUpdate('cascade');
            $table->double('monto');
            $table->string('punto_cuenta',100);
            $table->string('estatus',45);
            $table->double('tasa');
            $table->double('monto_divisa');
            $table->integer('id_divisa');
            $table->timestamps();
        });
    }

    public function down()
    {
        schema::drop('modificacion_presupuestaria');
    }
}
