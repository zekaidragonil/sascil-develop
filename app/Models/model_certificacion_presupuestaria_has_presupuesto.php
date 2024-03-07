<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class model_certificacion_presupuestaria_has_presupuesto extends Model
{
    use HasFactory;
    protected $table='certificacion_presupuestaria_has_presupuesto';
    protected $primaryKey='id';
    public static function solicitud_certificado($var,$ultimo_id)
    {
        //dd('llegue',$ultimo_id);
        $vacio=0;
        $contar=0;
        //dd($var->all());
        for ($i=0; $i < count($var->numero); $i++) {
            $count=(string)$i;
            $id_partida = DB::table('clasificador_presupuestario')->select('id')->where('codigo_partida','=',$var->id_partida[$i])->get();

            //dd($id_partida[0]->id,$var->codigo_proyecto[$i]);
            $id_presupuesto=DB::table('presupuesto')->select('saldo_disponible','id','monto')->where('id_unidad','=',session('id_unidad'))->where('id_proyecto','=',$var->id_proyecto[$i])->where('id_clasificador_presupuestario','=',$id_partida[0]->id)->where('saldo_disponible','=',doubleval(str_replace('.','',$var->saldo_disponible[$i])))->get();

            //dd($var->id_proyecto[$i],$id_presupuesto);
            //$id_monto_proyecto= model_proyecto::consulta($var);

            $id_pre=$id_presupuesto;
            //dd(count($id_pre),$i,empty($var->monto_certificar[$i]));

            if($var->monto_certificar[$i]!= '' && count($id_pre)!=0)
            { 
                //dd($var->monto_certificar[$i]);
                $solicitud_presupuestaria= new model_certificacion_presupuestaria_has_presupuesto();
                $solicitud_presupuestaria->id_certificacion_presupuestaria = $ultimo_id;
                $solicitud_presupuestaria->id_presupuesto=$id_pre[0]->id;
                $solicitud_presupuestaria->id_proyecto=$var->id_proyecto[$i];
                $solicitud_presupuestaria->id_unidad=session('id_unidad');
                $solicitud_presupuestaria->id_clasificador_presupuestario = $id_partida[0]->id;
                $solicitud_presupuestaria->pre_comprometido = doubleVal(str_replace(',','.',str_replace('.','',$var->monto_certificar[$i])));
                $solicitud_presupuestaria->monto =doubleVal(str_replace(',','.',str_replace('.','',$var->monto_certificar[$i])));
                $solicitud_presupuestaria->saldo_disponible=doubleVal(str_replace(',','.',str_replace('.','',$var->saldo_disponible[$i])))-doubleVal(str_replace(',','.',str_replace('.','',$var->monto_certificar[$i])));
                $solicitud_presupuestaria->save();

                $presupuesto = DB::table('certificacion_presupuestaria_has_presupuesto')->select('id_presupuesto','pre_comprometido','monto','saldo_disponible')->get();             
               
                //dd($presupuesto);
                $actualizar_presupuesto = new model_presupuesto();
                $actualizar_presupuesto = model_presupuesto::find($id_presupuesto[0]->id);
                //dd($id_presupuesto[0]->id,doubleVal(str_replace('.','',$var->$monto)),$var->$monto_certificar);
                $actualizar_presupuesto->pre_comprometido = doubleVal(str_replace(',','.',str_replace('.','',$var->monto_certificar[$i])));
                $actualizar_presupuesto->saldo_disponible = doubleVal(str_replace(',','.',str_replace('.','',$var->saldo_disponible[$i])))-doubleVal(str_replace(',','.',str_replace('.','',$var->monto_certificar[$i])));
                $actualizar_presupuesto->save();
            }
        }
        return true;
    }
}
