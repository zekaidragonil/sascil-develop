<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Moneda extends Migration
{

    public function up()
    {
        schema::create('moneda',function(Blueprint $table){
            $table->increments('id');
            $table->string('tipo_moneda',40);
            $table->timestamps();

        });
    }
    public function down()
    {
        schema::drop();
    }
}
