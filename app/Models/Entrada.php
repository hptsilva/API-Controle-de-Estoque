<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entrada extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_produto',
        'id_fornecedor',
        'quantidade',
        'nota_fiscal',
        'observacoes',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
