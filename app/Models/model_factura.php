<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class model_factura extends Model
{
    use HasFactory;
    protected $table='factura';
    protected $primaryKey='id';
    public function detalle_factura()
    {
        return $this->hasMany('App\model_detalle_factura');
    }
    public static function validar($id_instrumento_legal){
        $factura = DB::table('factura')->select('id')->where('id_instrumento_legal','=',$id_instrumento_legal)->get();
        if (count($factura)==0) {
            return true;
        }
        else{
            return false;
        }
    }
    public static function factura ($id_instrumento_legal){
        $factura = DB::table('factura')->select(DB::raw("sum('monto_bruto') as total"))->where('id_instrumento_legal','=',$id_instrumento_legal)->get();
        //dd($factura);
        return $factura;
    }
    public static function ingresar_factura($request){
        $factura = new model_factura();
        
    }
}
