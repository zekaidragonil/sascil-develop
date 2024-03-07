<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_fianza_instrumento_legal extends Model
{
    use HasFactory;
    protected $table="fianza_instrumento_legal";
    public function instrumento_legal()
    {
        return $this->BelongsTo('App\model_instrumento_legal');
    }
    public function fianza()
    {
        return $this->BelongsTo('App\model_fianza');
    }
}
