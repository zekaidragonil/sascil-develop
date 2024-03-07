<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EstatusActa extends Migration
{

    public function up()
    {
        schema::create('estatus_acta',function(Blueprint $table){
            $table->increments('id');
            $table->string('estatus');
            $table->timestamps();
        });
    }

    public function down()
    {
        schema::drop('estatus_acta');
    }
}
