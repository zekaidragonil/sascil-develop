<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModalidadContratacion extends Migration
{

    public function up()
    {
        schema::create('modalidad_contratacion',function(Blueprint $table){
            $table->increments('id');
            $table->string('modalidad',50);
            $table->string('siglas',5);
            $table->timestamps();
        });
    }

    public function down()
    {
        schema::drop('modalidad_contratacion');
    }
}
