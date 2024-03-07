<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_estatus_acta extends Model
{
    use HasFactory;
    protected $table='estatus_acta';
    protected $primaryKey='id';
    public function actas()
    {
        return $this->hasMany('App\model_actas');
    }
}
