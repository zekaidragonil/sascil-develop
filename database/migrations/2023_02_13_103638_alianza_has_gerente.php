<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlianzaHasGerente extends Migration
{

    public function up()
    {
        Schema::create('alianza_has_gerente',function(Blueprint $table){
            $table->integer('id_alianza')->references('id')->on('alianza')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_usuario')->references('id')->on('usuario')->onDelete('cascade')->onUpdate('cascade');
            $table->datetime('fecha_asignado');
            $table->datetime('fecha_respuesta');
            $table->timestamps();
        });
    }

    public function down()
    {
        //
    }
}
