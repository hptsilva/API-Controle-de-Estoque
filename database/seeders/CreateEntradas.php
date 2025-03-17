<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Produto; // Importe o model Produto
use App\Models\Fornecedore; // Importe o model Fornecedor

class CreateEntradas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produtos = Produto::all();
        $fornecedores = Fornecedore::all();

        for ($i = 0; $i < 10; $i++) {
            DB::table('entradas')->insert([
                'id_produto' => $produtos->random()->id,
                'id_fornecedor' => $fornecedores->random()->id,
                'quantidade' => rand(1, 100),
                'nota_fiscal' => 'NF-' . rand(1000, 9999),
                'observacoes' => 'Observação ' . ($i + 1),
            ]);
        }
    }
}
