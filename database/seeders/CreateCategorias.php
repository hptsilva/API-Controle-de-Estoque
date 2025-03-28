<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CreateCategorias extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            [
                'nome' => 'Eletrônicos',
            ],
            [
                'nome' => 'Vestuário',
            ],
            [
                'nome' => 'Alimentos',
            ],
            [
                'nome' => 'Geral',
            ],
        ]);
    }
}
