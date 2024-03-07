<?php

namespace App\Models;

use App\Models\Trabajadores;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Asignacion_De_Viatico extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'identificadorSeleccionado', 
        'trabajador_id', 
        'estatus', 
        'trasladoConpernota', 
        'alojamientoConpernota', 
        'alimentacionConpernota', 
        'trasladoSinpernota', 
        'alimentacionSinpernota', 
        'Cdesde', 
        'Chasta', 
        'Sdesde', 
        'Shasta', 
        
     ];
  
     public function trabajador()
    {
        return $this->belongsTo(Trabajadores::class, 'trabajador_id');
    }
    
}
