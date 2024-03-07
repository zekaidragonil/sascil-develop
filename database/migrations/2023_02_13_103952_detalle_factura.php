<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetalleFactura extends Migration
{

    public function up()
    {
        Schema::create('detalle_factura',function(Blueprint $table){
            $table->increments('id');
            $table->text('descripcion');
            $table->integer('unidad_medida');
            $table->integer('factura_id')->references('id')->on('factura')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('detalle_factura');
    }
}
