<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TipoInstrumentoLegal extends Migration
{

    public function up()
    {
        schema::create('tipo_instrumento_legal',function(Blueprint $table){
            $table->increments('id');
            $table->string('tipo',45);
            $table->timestamps();
        });
    }


    public function down()
    {
        schema::drop('tipo_instrumento_legal');
    }
}
