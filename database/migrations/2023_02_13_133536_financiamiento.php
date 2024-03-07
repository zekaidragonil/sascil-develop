<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Financiamiento extends Migration
{

    public function up()
    {
        schema::create('financiamiento',function(Blueprint $table){
            $table->increments('id');
            $table->integer('numero_certificacion');
            $table->integer('numero_punto_cuenta');
            $table->double('monto_tratamiento');
            $table->double('monto_total_pagado');
            $table->double('monto_total_deuda');
            $table->integer('id_fuente_financiamiento')->references('id')->on('fuente_financiamiento')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        schema::drop('financiamiento');
    }
}
