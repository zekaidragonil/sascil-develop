<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_proyecto_solic extends Model
{
    use HasFactory;
    protected $table='proyecto_solicitud';
    public function solicitud()
    {
        return $this->belongsTo('App\model_solicitud');
    }
    public function proyecto()
    {
        return $this->hasMany('App\model_proyecto');
    }
}
