<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class fondo extends Seeder
{
    public function run()
    {
        DB::table('fondo')->insert(['fondo'=>'FONDPROPIO']);
        DB::table('fondo')->insert(['fondo'=>'FONDEN']);
        DB::table('fondo')->insert(['fondo'=>'FONDO CHINO']);
        DB::table('fondo')->insert(['fondo'=>'BANDES']);
        DB::table('fondo')->insert(['fondo'=>'MINISTERIO']);
        DB::table('fondo')->insert(['fondo'=>'FONDO RECTIFICACIONES']);
        DB::table('fondo')->insert(['fondo'=>'FONDO INDEPENDIENTE']);
        DB::table('fondo')->insert(['fondo'=>'MPPEE']);
        DB::table('fondo')->insert(['fondo'=>'LEEA']);
        DB::table('fondo')->insert(['fondo'=>'FUENTE FINANCIERA']);
    }
}
