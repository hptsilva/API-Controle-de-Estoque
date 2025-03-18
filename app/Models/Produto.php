<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nome',
        'marca',
        'descricao',
        'unidade_medida',
        'categoria',
        'quantidade',
        'preco_custo',
        'preco_venda',
        'created_at',
    ];

    protected $hidden = [
        'updated_at',
    ];
}
