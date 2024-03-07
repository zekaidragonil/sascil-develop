<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Proyecto extends Migration
{
    public function up()
    {
        schema::create('proyecto',function(Blueprint $table){
            $table->increments('id');
            $table->integer('numero');
            $table->string('proyecto_presupuestario',20);
            $table->text('nombre_proyecto');
            $table->text('nombre_subproyecto');
            $table->date('fecha');
            $table->string('categoria',1);
            $table->integer('id_fondo')->references('id')->on('fondo')->onDelete('cascade')->onUpdate('cascade');
            $table->double('monto_proyecto');
            $table->integer('id_ente')->references('id')->on('ente')->onDelete('cascade')->onUpdate('cascade');
            $table->string('fecha_poa');
            $table->timestamps();
        });
    }

    public function down()
    {
        schema::drop('proyecto');
    }
}
