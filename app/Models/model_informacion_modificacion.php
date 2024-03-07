<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_informacion_modificacion extends Model
{
    use HasFactory;
    protected $table = 'informacion_modificacion';
    protected $primary_key = 'id';

    public static function modificacion_presupuestaria(){
        return $this->hasMany('App\modificacion_presupuestaria');
    }
}
