<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(cargo::class);
        $this->call(clasificador_presupuestario::class);
        $this->call(ente::class);
        $this->call(estado::class);
        $this->call(estatus::class);
        $this->call(estatus_acta::class);
        $this->call(fondo::class);
        $this->call(fuente_financiamiento::class);
        $this->call(moneda::class);
        $this->call(municipio::class);
        $this->call(parroquia::class);
        $this->call(perfil::class);
        $this->call(tipo_contratacion::class);
        $this->call(tipo_empresa::class);
        $this->call(tipo_instrumento_legal::class);
        $this->call(unidad::class);
        
    }
}
