<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Estatus extends Migration
{
   
    public function up()
    {
        schema::create('estatus',function(Blueprint $table){
            $table->increments('id');
            $table->string('nombre_estatus',80);
            $table->text('descripcion');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        schema::drop('estatus');
    }
}
