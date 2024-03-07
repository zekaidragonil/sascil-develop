<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tipo_empresa extends Seeder
{

    public function run()
    {
        DB::table('tipo_empresa')->insert(['tipo_empresa'=>'Productos']);
        DB::table('tipo_empresa')->insert(['tipo_empresa'=>'Servicios']);
    }
}
