<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ActaInstrumentoLegal extends Migration
{

    public function up()
    {
        Schema::create('acta_instrumento_legal',function($table){
            $table->integer('id_instrumento_legal')->references('id')->on('instrumento_legal')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_acta')->references('id')->on('actaS')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('$table');
    }
}
