<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Adendum extends Migration
{
    public function up()
    {
        Schema::create('adendum',function(Blueprint $table){
            $table->increments('id');
            $table->text('adendum');
            $table->date('fecha_adendum');
            $table->integer('instrumento_legal_id')->reference('id')->on('instrumento_legal')->onDelete('cascade')->onUpdate('cascade');
        });
    }
    public function down()
    {
        Schema::drop('adendum');
    }
}
