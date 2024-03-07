<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class model_revision_instrumento_legal extends Model
{
    use HasFactory;
    protected $table = 'revision_instrumento_legal';
    protected $primaryKey='id';

    public function solicitud(){
        return  $this->belongsTo('App\model_solicitud');
    }
    public static function borrador_contrato($data){
        //dd($data->all());
        $doc=$data->file('borrador_contrato');
        $inst_borrador = $data->file('borrador_contrato')->getClientOriginalName();
        $url = 'borrador_contrato/'. $inst_borrador;
        //dd($url1);
        //$doc->move('certificaciones_presupuestarias_aprobadas',$url);
        $estatus = DB::table('estatus')->select('id','nombre_estatus')->where('id','=',$data->estatus)->get();
        //dd($estatus->all());
        
        $solicitud = model_solicitud::find($data->id_solicitud);
        $solicitud->id_estatus = $data->estatus;
        $solicitud->estatus = $estatus[0]->nombre_estatus;
        $solicitud->save();

        $borrador = new model_revision_instrumento_legal();
        $borrador->id_solicitud= $data->id_solicitud;
        $borrador->documento = $url;
        $borrador->save();
        //dd('guarde');
        return true;
    }
}
