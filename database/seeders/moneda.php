<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class moneda extends Seeder
{
    public function run()
    {
        DB::table('moneda')->insert(['tipo_moneda'=>'Dolar']);
        DB::table('moneda')->insert(['tipo_moneda'=>'Euro']);
        DB::table('moneda')->insert(['tipo_moneda'=>'Petro']);
        DB::table('moneda')->insert(['tipo_moneda'=>'Bolivares']);
    }
}
