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
        'preco_custo',
        'quantidade',
        'nota_fiscal',
        'observacoes',
        'created_at',
    ];

    protected $hidden = [
        'updated_at',
    ];
}
