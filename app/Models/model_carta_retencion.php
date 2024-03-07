<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_carta_retencion extends Model
{
    use HasFactory;
    protected $table='carta_retencion';
    protected $primaryKey='id';

    public function solicitud(){
        return $this->belongsTo('App\model_solicitud');
    }
}
