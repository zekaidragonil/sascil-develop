<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Anticipo extends Migration
{
    public function up()
    {
        Schema::create('anticipo',function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_instrumento_leg');
            $table->double('porcentaje_anticipo');
            $table->double('monto_anticipo');
            $table->double('porsentaje_anticipo_amortizado');
            $table->double('monto_anticipo_amortizado');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('anticipo');
    }
}
