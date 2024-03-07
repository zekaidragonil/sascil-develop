<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InstrumentoLegalAsociado extends Migration
{

    public function up()
    {
        schema::create('instrumento_legal_asociado',function(Blueprint $table){
            $table->increments('id');
            $table->string('numero');
            $table->date('fecha_suscripción');
            $table->date('fecha');
            $table->text('pdf');
            $table->date('fecha_estatus');
            $table->text('objeto');
            $table->timestamp('plazo_entrega');
            $table->double('monto');
            $table->integer('id_estatus')->references('id')->on('estatus')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_tipo_instrumento_legal')->references('id')->on('tipo_instrumento_legal')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_moneda')->references('id')->on('moneda')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_avance')->references('id')->on('avance')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_anticipo')->references('id')->on('anticipo')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_solicitud')->references('id')->on('solicitud')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }


    public function down()
    {
        schema::drop('instrumento_legal_asociado');
    }
}
