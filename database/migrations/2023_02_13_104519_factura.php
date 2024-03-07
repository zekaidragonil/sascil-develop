<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Factura extends Migration
{
 
    public function up()
    {
        schema::create('factura',function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_instrumento_legal')->references('id')->on('instrumento_legal')->onDelete('cascade')->onUpdate('cascade');
            $table->string('numero_factura',30);
            $table->date('fecha');
            $table->double('monto_bruto');
            $table->text('deducciones');
            $table->timestamps();
        });
    }

    public function down()
    {
        schema::drop('factura');
    }
}
