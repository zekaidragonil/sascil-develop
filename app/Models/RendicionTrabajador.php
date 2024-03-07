<?php

namespace App\Models;

use App\Models\Trabajadores;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RendicionTrabajador extends Model
{
    use HasFactory;
    protected $fillable = [
        'trabajador_id',
        'monto_asignado',
        'monto_factura',
        'cuenta_bancaria',
        'cantidad_faltante',
        'observacion',
    ];

    public function trabajador()
    {
        return $this->belongsTo(Trabajadores::class, 'trabajador_id');
    }
}
