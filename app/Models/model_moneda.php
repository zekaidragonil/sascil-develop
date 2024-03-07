<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class model_moneda extends Model
{
    use HasFactory;
    protected $table='moneda';
    protected $primaryKey='id';
    
    public function instrumento_legal()
    {
        return $this->hasMany('App\instrumento_legal');
    }
    public static function divisa(){
        $divisa=DB::table('moneda')->select('id','tipo_moneda')->get();
        return $divisa;
    }
}
