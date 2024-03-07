<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_traspaso_unidades extends Model
{
    use HasFactory;
    protected $table = "traspaso_unidades";

    public static function trapaso_unidad($data){
        //dd($data->all());
        $cont = count($data->unidad_cedente);
        $presupuesto_cedente = model_presupuesto::find($data->posicion_cedente);
        //dd($presupuesto_cedente);
        for ($i=0; $i < $cont ; $i++) { 
            if ($presupuesto_cedente[0]->saldo_disponible > 0) {
                $presupuesto_cedente[0]->saldo_disponible = $presupuesto_cedente[0]->saldo_disponible - floatval(str_replace(',','.',str_replace('.','',$data->monto_ceder[0])));
                $presupuesto_cedente[0]->save();
            }
        }
        $presupuesto_receptor = model_presupuesto::find($data->posicion_receptora);
        for ($j=0; $j < $cont; $j++) { 
            $presupuesto_receptor[0]->saldo_disponible = $presupuesto_receptor[0]->saldo_disponible + floatval(str_replace(',','.',str_replace('.','',$data->monto_ceder[0])));

            $presupuesto_receptor[0]->save();
        }

        for ($i=0; $i < $cont; $i++) {
            $traspaso_unidades = new model_traspaso_unidades();
            $traspaso_unidades->id_presupuesto_cedente = $data->posicion_cedente[$i];
            $traspaso_unidades->id_presupuesto_receptor = $data->posicion_receptora[$i];
            $traspaso_unidades->monto_cedido = floatval(str_replace(',','.',str_replace('.','',$data->monto_ceder[$i])));
            $traspaso_unidades->fecha_traspaso = date('Y-m-d');
            $traspaso_unidades->ficha_traspaso_unidades = $data->traspaso_entre_unidades;
            $traspaso_unidades->save();
        }
        return true;
    }

}
