<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Alianza extends Migration
{

    public function up()
    {
        schema::create('alianza',function(Blueprint $table){
            $table->increments('id');
            $table->integer('correlativo_alianza');
            $table->string('solicitud_alianza',60);
            $table->string('numero_alianza',50);
            $table->string('numero_punto',60);
            $table->string('numero_control',60);
            $table->date('fecha_punto');
            $table->string('punto_cuenta',100);
            $table->string('estatus',45);
            $table->text('espesificaciones_tecnicas');
            $table->text('matriz_tecnica');
            $table->text('memorandum');
            $table->text('observaciones');
            $table->integer('id_unidad')->references('id')->on('unidad')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_estatus')->references('id')->on('estatus')->omDelete('cascade')->onUpdate('cascade');
            $table->text('punto_estatus');
            $table->string('numero_punto_estatus',45);
            $table->string('numero_control_estatus',45);
            $table->datetime('fecha_punto_estatus');
            $table->text('descripcion_alianza');
            $table->date('fecha_recibido');
            $table->date('fecha_numeracion');
            $table->timestamps();
        });
    }

    public function down()
    {
        schema::drop('alianza');
    }
}
