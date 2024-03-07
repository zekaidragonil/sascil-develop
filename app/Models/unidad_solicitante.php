<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unidad_solicitante extends Model
{
    use HasFactory;
    protected $fillable = [
        'viaticos',
        'memorandum',
        'estatus',
        'identificador'
    ];
}
