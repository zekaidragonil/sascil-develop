<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class model_acta_instrumento_legal extends Model
{
    use HasFactory;
    protected $table = 'acta_instrumento_legal';
    public function actas()
    {
        return $this->BelongsTo('App\model_actas');
    }
    public function intrumento_legal()
    {
        return $this->BelongsTo('App\model_instrumento_legal');
    }
}
