<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class viaticoAprobados extends Model
{
    use HasFactory;
   
    protected $fillable = [
       'identificadorSeleccionado', 'nombre', 'apellido', 'ci', 'cuenta_bancaria', 'referencia_bancaria', 'carnet',
        'cedula_copias', 'estatus', 'traslado', 'alojamiento', 'alimentacion', 'dias',
    ];

 }