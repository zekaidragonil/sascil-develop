<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuario extends Migration
{
    public function up()
    {
        schema::create('usuario',function(Blueprint $table){
            $table->increments('id');
            $table->string('nombre',80);
            $table->string('apellido',80);
            $table->string('cedula',45);
            $table->text('clave');
            $table->text('correo');
            $table->integer('estatus');
            $table->integer('id_cargo')->references('id')->on('cargo')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_perfil')->references('id')->on('perfil')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_unidad')->references('id')->on('unidad')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('activo');
            $table->timestamps();
        });
    }

    public function down()
    {
        schema::drop('usuario');
    }
}
