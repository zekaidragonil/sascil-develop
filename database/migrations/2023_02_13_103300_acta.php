<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Acta extends Migration
{
    public function up()
    {
        Schema::create('acta',function(Blueprint $table){
            $table->increments('id');
            $table->string('numero_acta');
            $table->date('fecha_acta');
            $table->integer('id_estatus_acta')->references('id')->on('estatus_acta')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('acta');
    }
}
