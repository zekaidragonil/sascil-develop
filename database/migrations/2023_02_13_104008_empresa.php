<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Empresa extends Migration
{

    public function up()
    {
        schema::create('empresa',function(Blueprint $table){
            $table->increments('id');
            $table->string('nombre',200);
            $table->text('direccion');
            $table->string('rif',12);
            $table->string('correo',150);
            $table->string('20',20);
            $table->integer('id_estado')->references('id')->on('estado')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_municipio')->references('id')->on('municipio')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_parroquia')->references('id')->on('parroquia')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_tipo_empresa')->references('id')->on('tipo_empresa')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        schema::drop('empresa');
    }
}
