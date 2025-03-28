<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nome',
        'created_at',
    ];

    protected $hidden = [
        'updated_at',
    ];
}
