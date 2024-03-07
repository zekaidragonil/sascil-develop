<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Avance extends Migration
{
    public function up()
    {
        Schema::create('avance',function(Blueprint $table){
            $table->increments('id');
            $table->string('porsentaje_fisico',80);
            $table->double('porcentaje_financiero');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('avance');
    }
}
