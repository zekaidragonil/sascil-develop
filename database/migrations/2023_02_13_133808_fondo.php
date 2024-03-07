<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Fondo extends Migration
{

    public function up()
    {
        schema::create('fondo',function(Blueprint $table){
            $table->increments('id');
            $table->string('fondo',45);
            $table->timestamps();
        });
    }

    public function down()
    {
        schema::drop('fondo');
    }
}
