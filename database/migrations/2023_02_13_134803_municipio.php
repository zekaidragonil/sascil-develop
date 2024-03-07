<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Municipio extends Migration
{
    public function up()
    {
        schema::create('municipio',function(Blueprint $table){
            $table->integer('id');
            $table->string('municipio');
            $table->integer('id_estado')->references('id')->on('estado')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::drop('municipio');
    }
}
