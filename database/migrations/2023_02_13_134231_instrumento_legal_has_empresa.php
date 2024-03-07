<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InstrumentoLegalHasEmpresa extends Migration
{
    public function up()
    {
        Schema::create('instrumento_legal_has_empresa',function(Blueprint $table){
            $table->integer('id_instrumento_legal')->references('id')->on('instrumento_legal')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_empresa')->references('id')->on('empresa')->onDelete('cascade')->onUpdate('cascade');
            $table->datetime('fecha_registro');
            $table->timestamps();
        });
    }

    public function down()
    {
        //
    }
}
