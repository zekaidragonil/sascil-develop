<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class model_fondo extends Model
{
    use HasFactory;
    protected $table='fondo';
    protected $primaryKey='id';
    public function presupuesto()
    {
        return $this->hasMany('App\model_presupuesto');
    }
    public function presupuesto_temporal(){
        return $this->hasMany('App\model_presupuesto_temporal');
    }
    public static function fondo()
    {
        $fondo=DB::table('fondo')->select('id','fondo')->get();
        return $fondo;
    }
    public static function id_fondo($n_fondo)
    {
        //dd($n_fondo);
        $n_fondo = DB::table('fondo')->select('id')->where ('fondo','=',$n_fondo)->get();
        return $n_fondo;
    }
}

