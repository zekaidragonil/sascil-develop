<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class estatus_acta extends Seeder
{
    public function run()
    {
        DB::table('estatus_acta')->insert(['estatus'=>'FECHA ACTA DE INICIO']);
        DB::table('estatus_acta')->insert(['estatus'=>'FECHA ACTA DE PARALIZACIÓN']);
        DB::table('estatus_acta')->insert(['estatus'=>'FECHA ACTA DE REINICIO']);
        DB::table('estatus_acta')->insert(['estatus'=>'FECHA ACTA DE RECEPCIÓN PROVICIONAL']);
        DB::table('estatus_acta')->insert(['estatus'=>'FECHA ACTA DE FINALIZACION Ö TERMINACION Ó CULMINACION Ó FINIQUITO']);
    }
}
