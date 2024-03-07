<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Database\Eloquent\Relations\HasMany;

class model_fuente_financiamiento extends Model
{
    use HasFactory;
    protected $table='fuente_financiamiento';
    protected $primaryKey='id';
    public function financiamiento()
    {
        return $this->hasmany('App\Models\model_financiamiento');
    }

    public static function fuete_financiemiento()
    {
        $fuente=DB::table('fuente_financiamiento')->select('id','fuente')->get();
        return $fuente;
    }
    public static function agregar_financiemiento($finan)//funcion para agregar nuevo financiamiento
    {

    }

}
