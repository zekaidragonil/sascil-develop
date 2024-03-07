<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ente extends Migration
{

    public function up()
    {
        schema::create('ente',function(Blueprint $table){
            $table->increments('id');
            $table->text('nombre');
            $table->string('rif',12);
            $table->integer('id_parroquia')->references('id')->on('parroquia')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        schema::drop('ente');
    }
}
