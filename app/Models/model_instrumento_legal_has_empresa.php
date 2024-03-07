<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_instrumento_legal_has_empresa extends Model
{
    use HasFactory;
    protected $table = 'instrumento_legal_has_empresa';
    
    public function instrumento_legal(){
        return $this->belongsTo('App\model_instrumento_legal');
    }
    
    public function empresa(){
        return $this->belongsTo('App\model_empresa');
    }
}
