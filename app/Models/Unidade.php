<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unidade extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nome',
        'sigla',
        'created_at',
    ];

    protected $hidden = [
        'updated_at',
    ];
}
