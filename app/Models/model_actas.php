<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_actas extends Model
{
    use HasFactory;
    protected $table = 'acta';
    protected $prymaryKey = 'id';
    public function acta_instrumento_legal ()
    {
        return $this->hasMany('App\model_acta_instrumento_legal');
    }
}
