<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TipoEmpresa extends Migration
{
    public function up()
    {
        schema::create('tipo_empresa',function(Blueprint $table){
            $table->increments('id');
            $table->string('tipo_empresa',80);
        });
    }

    public function down()
    {
        schema::drop('tipo_empresa');
    }
}
