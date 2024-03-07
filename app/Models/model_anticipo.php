<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class model_anticipo extends Model
{
    use HasFactory;
    protected $table = 'anticipo';
    protected $primaryKey = 'id';
    public function instrumento_legal()
    {
        return $this->hasMany('App\model_instrumento_legal');
    }

    public static function anticipo($data){
        $anticipo = DB::table('anticipo')->select('id')->where('id_instrumento_leg','=',$data)->get();
        if (count($anticipo)==0) {
            return true;
        }else{
            return false;
        }
    }
}
