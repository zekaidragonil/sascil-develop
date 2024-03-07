<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Estado extends Migration
{
    
    public function up()
    {
        schema::create('estado',function(Blueprint $table){
            $table->increments('id');
            $table->string('estado',30);
            $table->timestamps();
        });
    }

    public function down()
    {
        schema::drop();
    }
}
