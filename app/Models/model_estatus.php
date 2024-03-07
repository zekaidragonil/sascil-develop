<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class model_estatus extends Model
{
    use HasFactory;
    protected $table='estatus';
    protected $primaryKey='id';
    public function instrumento_legal()
    {
        return $this->hasMany('App\model_instrumento_legal');
    }
    public function solicitud(){
        return $this->hasMany('App\model_solicitud');
    } 
    public function alianza(){
        return $this->belongsTo('App\model_alianza');
    }
    public static function estatus($id_estatus)
    {
        //dd($id_estatus);
        $estatus = DB::table('estatus')->select('id','nombre_estatus')->get();
        //dd($estatus);
        if ($id_estatus==null) {
            $estatus = DB::table('estatus')->select('id','nombre_estatus')->get();
            //dd('llegue',$estatus);
            return $estatus;
        }else{
            $estatus = DB::table('estatus')->select('id','nombre_estatus')->where('id','>',$id_estatus)->get();
            //dd('llegue',$estatus);
            return $estatus;
        }
        
    }
    public static function est($id){//consulta de un estatus de alianza
        $estatus = DB::table('estatus')->select('id','nombre_estatus')->where('id','=',$id)->get();
        return $estatus;
    }
    public static function estatus_juridico(){
        $estatus = DB::table('estatus')->select('id','nombre_estatus')->where('id','=','6')->orwhere('id','=','11')->get();
        return $estatus;
    }
}
