<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class model_tipo_empresa extends Model
{
    use HasFactory;
    protected $table = 'tipo_empresa';

    public function empresa_tipo(){
        return $this->hasMany('App\model_empresa');
    }
    public static function tipo(){
        $tipo = DB::table('tipo_empresa')->select('id','tipo')->get();
        return $tipo;
    }
}
