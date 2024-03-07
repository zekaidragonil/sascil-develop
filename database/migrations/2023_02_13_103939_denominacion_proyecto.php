<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DenominacionProyecto extends Migration
{

    public function up()
    {
        Schema::create('denominacion_proyecto',function(Blueprint $table){
            $table->increments('id');
            $table->text('nombre_proyecto');
            $table->string('proyecto_presupuestario',5);
            $table->timestamps();
        });
    }


    public function down()
    {
        schema::drop('denominacion_proyecto');
    }
}
