<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Fianza extends Migration
{

    public function up()
    {
        schema::create('fianza',function(Blueprint $table){
            $table->increments('id');
            $table->string('numero_fianza',20);
            $table->double('monto_fianza');
            $table->string('tipo_fianza',45);
            $table->text('fianza');
            $table->datetime('fecha_caducidad');
            $table->integer('id_solicitud');
            $table->integer('id_alianza');
            $table->timestamps();
        });
    }

    public function down()
    {
        schema::drop('fianza');
    }
}
