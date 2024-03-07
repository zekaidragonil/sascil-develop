<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class fuente_financiamiento extends Seeder
{

    public function run()
    {
        DB::table('fuente_financiamiento')->insert(['fuente'=>'FONDO PROPIO']);
        DB::table('fuente_financiamiento')->insert(['fuente'=>'FONDEM']);
        DB::table('fuente_financiamiento')->insert(['fuente'=>'FONDO CHINO']);
        DB::table('fuente_financiamiento')->insert(['fuente'=>'BANDES']);
        DB::table('fuente_financiamiento')->insert(['fuente'=>'MINISTERIO']);
    }
}
