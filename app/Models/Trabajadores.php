<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asignacion_De_Viatico;
use App\Models\RendicionTrabajador;
class Trabajadores extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellido', 
        'ci', 
        'cuenta_bancaria',
        'referencia_bancaria',
        'carnet',
        'cedula_copias', 
     ];
     
     
     
     public function viaticos()
     {
         return $this->hasMany(Asignacion_De_Viatico::class, 'trabajador_id');
     }
     public function rendiciones()
     {
         return $this->hasMany(RendicionTrabajador::class, 'trabajador_id');
     }
   
 
}
