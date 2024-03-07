<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRendicionTrabajadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendicion_trabajadors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trabajador_id');
            $table->foreign('trabajador_id')->references('id')->on('trabajadores'); 
            $table->decimal('monto_asignado', 10, 2);
            $table->decimal('monto_factura', 10, 2);
            $table->string('cuenta_bancaria');
            $table->decimal('cantidad_faltante', 10, 2)->nullable();
            $table->text('observacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rendicion_trabajadors');
    }
}
