<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CreateUnidades extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('unidades')->insert([
            [
                'nome' => 'Unidade',
                'sigla' => 'UN'
            ],
            [
                'nome' => 'Kilograma',
                'sigla' => 'Kg'
            ],
            [
                'nome' => 'Grama',
                'sigla' => 'g'
            ],
            [
                'nome' => 'Metro',
                'sigla' => 'm'
            ],
            [
                'nome' => 'Tonelada',
                'sigla' => 'T'
            ],
            [
                'nome' => 'Litro',
                'sigla' => 'L'
            ],
            [
                'nome' => 'Mililitro',
                'sigla' => 'ml'
            ],
            [
                'nome' => 'Centímetro',
                'sigla' => 'cm'
            ],
            
        ]);
    }
}
