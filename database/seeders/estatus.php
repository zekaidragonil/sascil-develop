<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class estatus extends Seeder
{
    public function run()
    {
        DB::table('estatus')->insert(['nombre_estatus'=>'FORMACIÓN','descripcion'=>'Proceso que esta en revisión por parte de procura y de la Comision de Contrataciones']);
        DB::table('estatus')->insert(['nombre_estatus'=>'LLAMADO','descripcion'=>'Proceso que esta publicado']);
        DB::table('estatus')->insert(['nombre_estatus'=>'INVITADO','descripcion'=>'Proceso que esta en invitación']);
        DB::table('estatus')->insert(['nombre_estatus'=>'CURSO','descripcion'=>'Proceso que se encuentra en etapa de calificación, evaluación de oferta, y recomendación. Previa recepción y o apertura de oferta']);
        DB::table('estatus')->insert(['nombre_estatus'=>'ADJUDICADO','descripcion'=>'Proceso que tiene punti de cuenta de adjudicación, luego se otorga al oferente (notificado) y entra en la etapa de elaboración de contrato']);
        DB::table('estatus')->insert(['nombre_estatus'=>'PEDIDO CREADO (FA)','descripcion'=>'Proceso que tiene pedido creado. Debe contener el nuemro de pedido. Es de obligatorio cumplimiento que tenga todos los documentos que soportan la creación (fianzas y contrato)']);
        DB::table('estatus')->insert(['nombre_estatus'=>'TERMINADO','descripcion'=>'Proceso que ha finalizado en etapa de calificación o evaluación de ofertas, según lo establecido en la ley de contrataciones']);
        DB::table('estatus')->insert(['nombre_estatus'=>'DEVUELTO','descripcion'=>'Proceso que no cumplecon los requisitos minimos para la contratación y se devuelve a la unidad solicitante']);
        DB::table('estatus')->insert(['nombre_estatus'=>'DESIERTO','descripcion'=>'Proceso que ha finalizado según lo establecido en la Ley de Contrataciones. LCP Art.133']);
        DB::table('estatus')->insert(['nombre_estatus'=>'REVISION','descripcion'=>'Proceso en que se envia el contrato a las partes involucradas para su revision (unidad solicituante y proveedor)']);
    }
}
