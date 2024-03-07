<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_instrumento_legal_financiamiento extends Model
{
    use HasFactory;
    protected $table='instrumento_legal_financiamiento';
    public function financiamiento()
    {
        return $this->BelongsTo('App\model_financiamiento');
    }
    public function instrumento_legal()
    {
        return $this->belongsTo('App\model_instrumento_legal');
    }
}
