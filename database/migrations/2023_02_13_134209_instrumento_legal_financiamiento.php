<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InstrumentoLegalFinanciamiento extends Migration
{

    public function up()
    {
        schema::create('instrumento_legal_financiamiento',function(Blueprint $table){
            $table->integer('id_instrumento_legal')->references('id')->on('instrumento_legal')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_financiamiento')->references('id')->on('instrumento_legal')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        //
    }
}
