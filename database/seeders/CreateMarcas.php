<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CreateMarcas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('marcas')->insert([
            [
                'nome' => 'Marca A',
            ],
            [
                'nome' => 'Marca B',
            ],
            [
                'nome' => 'Marca C',
            ],
            [
                'nome' => 'Marca D',
            ],
            [
                'nome' => 'Marca E',
            ],
            [
                'nome' => 'Marca F',
            ],
            [
                'nome' => 'Marca G',
            ],
            [
                'nome' => 'Marca H',
            ],
            [
                'nome' => 'Marca I',
            ],
            [
                'nome' => 'Marca J',
            ],
            [
                'nome' => 'Marca K',
            ],
        ]);
    }
}
