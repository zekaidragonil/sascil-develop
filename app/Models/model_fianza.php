<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class model_fianza extends Model
{
    use HasFactory;
    protected $table='fianza';
    protected $primaryKey='id';
    public function fianza_instrumento_legal()
    {
        return $this->hasMany('App\model_fianza_instrumento_legal');
    }
    public function solicitud(){
        return $this->hasMany('App\model_solicitud');
    }
    public static function consulta_solicitud($id){
        $consulta = DB::table('fianza')->select('tipo_fianza','fianza')->where('id_solicitud','=',$id)->get();
        return $consulta;
    } 
}
