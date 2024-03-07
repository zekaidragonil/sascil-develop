<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CertificacionPresupuestaria extends Migration
{
    
    public function up()
    {
        Schema::create('certificacion_presupuestaria',function(Blueprint $table){
            $table->increments('id');
            $table->integer('correlativo_unidad');
            $table->integer('correlativo_presupuesto');
            $table->string('nombre_solicitud',30);
            $table->text('nombre_certificado');
            $table->string('estatus',15);
            $table->text('observaciones');
            $table->text('observaciones2');
            $table->string('adjunto',200);
            $table->string('adjunto2',200);
            $table->datetime('fecha_generacion');
            $table->datetime('fecha_solicitud');
            $table->datetime('fecha_certificado');
            $table->integer('id_moneda')->references('id')->on('moneda')->onDelete('cascade')->onCreate('cascade');
            $table->double('tasa');
            $table->double('monto_estimado');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::drop('certificacion_presupuestaria');
    }
}
