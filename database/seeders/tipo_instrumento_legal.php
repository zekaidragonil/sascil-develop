<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tipo_instrumento_legal extends Seeder
{

    public function run()
    {
        DB::table('tipo_instrumento_legal')->insert(['tipo'=>'Contrato']);
        DB::table('tipo_instrumento_legal')->insert(['tipo'=>'Alianza']);
        DB::table('tipo_instrumento_legal')->insert(['tipo'=>'Convenio']);
        DB::table('tipo_instrumento_legal')->insert(['tipo'=>'Acuerdo']);
        DB::table('tipo_instrumento_legal')->insert(['tipo'=>'Orden de Servicio']);
        DB::table('tipo_instrumento_legal')->insert(['tipo'=>'Orden de Compra']);
    }
}
