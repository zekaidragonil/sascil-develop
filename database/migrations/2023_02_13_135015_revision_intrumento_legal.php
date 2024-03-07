<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RevisionIntrumentoLegal extends Migration
{

    public function up()
    {
        schema::create('revision_instrumento_legal',function(Blueprint $table){
            $table->increments('id');
            $table->text('documento');
            $table->integer('id_solicitud')->referecnes('id')->on('solicitud')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        schema::drop('revision_instrumento_legal');
    }
}
