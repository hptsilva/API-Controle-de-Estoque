<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fornecedore extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nome',
        'cnpj',
        'endereco',
        'telefone',
        'email',
        'contato',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
