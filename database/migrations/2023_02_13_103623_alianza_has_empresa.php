<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlianzaHasEmpresa extends Migration
{

    public function up()
    {
        Schema::create('alianza_has_empresa',function(Blueprint $table){
            $table->integer('id_empresa')->references('id')->on('empresa')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_alianza')->references('id')->on('alianza')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('alianza_has_empresa');
    }
}
