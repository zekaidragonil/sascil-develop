<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cargo extends Migration
{

    public function up()
    {
        Schema::create('cargo',function(Blueprint $table){
            $table->increments('id');
            $table->string('cargo',80);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('cargo');
    }
}
