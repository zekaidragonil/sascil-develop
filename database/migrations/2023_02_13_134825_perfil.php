<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Perfil extends Migration
{
    public function up()
    {
        schema::create('perfil',function(Blueprint $table){
            $table->increments('id');
            $table->string('nombre_perfil',80);
            $table->timestamps();
        });
    }

    public function down()
    {
        schema::drop();
    }
}
