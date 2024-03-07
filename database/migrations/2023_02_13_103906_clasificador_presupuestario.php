<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClasificadorPresupuestario extends Migration
{

    public function up()
    {
        Schema::create('clasificador_presupuestario',function(Blueprint $table){
            $table->increments('id');
            $table->string('codigo_partida');
            $table->text('descripcion');
            $table->text('agrupacion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('clasificador_presupuestario');
    }
}
