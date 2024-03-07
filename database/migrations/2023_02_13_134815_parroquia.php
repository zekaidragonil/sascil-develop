<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Parroquia extends Migration
{
    public function up()
    {
        schema::create('parroquia',function(Blueprint $table){
            $table->integer('id');
            $table->string('parroquia',50);
            $table->integer('id_municipio')->references('id')->on('municipio')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        schema::drop('parroquia');
    }
}
