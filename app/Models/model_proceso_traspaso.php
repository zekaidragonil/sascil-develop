<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\model_traspaso;
use DB;
class model_proceso_traspaso extends Model
{
    protected $table = 'proceso_traspaso';
    protected $primaryKey = 'id';

    use HasFactory;
    public static function proyecto(){
        return $this->BelongsTo('App\model_proyecto');
    }
    public static function clasificador_presupuestario(){
        return $this->BelongsTo('App\model_clasificador_presupuestario');
    }
    public static function solicitud_traspaso($data){
        $id =  model_traspaso::ultimo_traspaso();
        //dd($data->all());
        for ($i=0; $i < count($data->id_proyecto_cedente); $i++) { 
            $solicitud = new model_proceso_traspaso();
            $solicitud->proyecto_origen = intval($data->id_proyecto_cedente[$i]);
            $solicitud->presupuesto_origen = intval($data->id_presupuesto_cedente[$i]);
            $solicitud->monto_origen = doubleval(str_replace(',','.',str_replace('.','',$data->monto_disponible[$i])));
            $solicitud->proyecto_destino = intval($data->id_proyecto_receptor[$i]);
            $solicitud->presupuesto_destino = intval($data->id_presupuesto_receptor[$i]);
            $solicitud->monto_disponible = doubleval(str_replace(',','.',str_replace('.','',$data->monto_disponible_receptor[$i])));
            $solicitud->monto_solicitado = doubleval(str_replace(',','.',str_replace('.','',$data->monto_ceder[$i])));
            $solicitud->monto_total = doubleval(str_replace(',','.',str_replace('.','',$data->monto_total[$i])));
            $solicitud->id_traspaso = $id->id;
            $solicitud->save();
        }
        return true;
    }
    public static function consulta_traspaso($id){
        //dd($id);
        $consulta_traspaso=DB::table('proceso_traspaso as trs')->select('t.solicitud_traspaso','pr.nombre_proyecto as proyecto_origen','c_p.codigo_partida as partida_origen','trs.monto_origen','pr1.nombre_proyecto as proyecto_destino','c_p1.codigo_partida as partida_destino','trs.monto_disponible','trs.monto_solicitado','trs.monto_total','t.solicitud_credito_presupuestario','t.estatus','t.observacion')->join('proyecto as pr','pr.id','=','trs.proyecto_origen')->join('presupuesto as p','p.id','=','trs.presupuesto_origen')->join('proyecto as pr1','pr1.id','=','trs.proyecto_destino')->join('presupuesto as p1','p1.id','=','trs.presupuesto_destino')->join('clasificador_presupuestario as c_p','c_p.id','=','p.id_clasificador_presupuestario')->join('clasificador_presupuestario as c_p1','c_p1.id','=','p1.id_clasificador_presupuestario')->join('traspaso as t','t.id','=','trs.id_traspaso')->where('trs.id_traspaso','=',$id)->get();
        //dd($id,$consulta_traspaso);
        return $consulta_traspaso;
    }
}
