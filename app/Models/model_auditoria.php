<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class model_auditoria extends Model
{
    use HasFactory;
    protected $table='auditoria';
    protected $primaryKey='id';

    public static function act($event,$tabla,$campo,$valor_anterior, $valor_actual, $fecha,$usuario)
    {
        $actividad = new model_auditoria();
        $actividad->actividad=$event;
        $actividad->tabla=$tabla;
        $actividad->campo=$campo;
        $actividad->valor_anterior=$valor_anterior;
        $actividad->valor_actual=$valor_actual;
        $actividad->fecha=$fecha;
        $actividad->usuario = $usuario;
        $actividad->save();
        return true;
    }
    public static function consultar()
    {
        $consulta = DB::table('auditoria')->select('id','actividad','tabla','campo','valor_anterior','valor_actual','fecha','usuario')->get();
        return $consulta;
    }
}
