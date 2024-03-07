<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TipoContratacion extends Migration
{

    public function up()
    {
        schema::create('tipo_contratacion',function(Blueprint $table){
            $table->increments('id');
            $table->string('tipo_cont',50);
            $table->string('siglas',5);
            $table->timestamps();
        });
    }

    public function down()
    {
        schema::drop('tipo_contrato');
    }
}
