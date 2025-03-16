<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Saida extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_produto',
        'id_fornecedor',
        'quantidade',
        'nota_fiscal',
        'observacoes',
        'created_at',
    ];

    protected $hidden = [
        'updated_at',
    ];
}
