<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Unidad extends Migration
{

    public function up()
    {
        schema::create('unidad',function(Blueprint $table){
            $table->increments('id');
            $table->text('nombre');
            $table->integer('id_ente');
            $table->string('siglas',45);
            $table->string('siglas_cert',45);
            $table->timestamps();
        });
    }

    public function down()
    {
        schema::drop('unidad');
    }
}
