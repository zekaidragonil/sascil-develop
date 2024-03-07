<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FuenteFinanciamiento extends Migration
{

    public function up()
    {
        schema::create('fuente_financiamiento',function(Blueprint $table){
            $table->increments('id');
            $table->string('fuente',45);
            $table->timestamps();
        });
    }

   
    public function down()
    {
        //
    }
}
