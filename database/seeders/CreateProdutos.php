<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CreateProdutos extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('produtos')->insert([
            [
                'nome' => 'Smartphone XYZ',
                'marca' => 'Marca A',
                'descricao' => 'Smartphone com tela de 6.5 polegadas e câmera dupla.',
                'unidade_medida' => 'UN',
                'categoria' => 'Eletrônicos',
                'preco_custo' => 1200.00,
                'preco_venda' => 2000.00,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'nome' => 'Arroz Integral',
                'marca' => 'Marca B',
                'descricao' => 'Arroz integral de alta qualidade.',
                'unidade_medida' => 'KG',
                'categoria' => 'Alimentos',
                'preco_custo' => 15.50,
                'preco_venda' => 30.00,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'nome' => 'Camiseta Algodão',
                'marca' => 'Marca C',
                'descricao' => 'Camiseta de algodão macia e confortável.',
                'unidade_medida' => 'UN',
                'categoria' => 'Vestuário',
                'preco_custo' => 45.00,
                'preco_venda' => 50.00,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'nome' => 'Lâmpada LED',
                'marca' => 'Marca D',
                'descricao' => 'Lâmpada LED de baixo consumo e alta durabilidade.',
                'unidade_medida' => 'UN',
                'categoria' => 'Geral',
                'preco_custo' => 12.99,
                'preco_venda' => 41.40,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'nome' => 'Notebook ABC',
                'marca' => 'Marca E',
                'descricao' => 'Notebook com processador potente e design elegante.',
                'unidade_medida' => 'UN',
                'categoria' => 'Eletrônicos',
                'preco_custo' => 2500.00,
                'preco_venda' => 4000.00,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'nome' => 'Feijão Carioca',
                'marca' => 'Marca F',
                'descricao' => 'Feijão carioca selecionado.',
                'unidade_medida' => 'KG',
                'categoria' => 'Alimentos',
                'preco_custo' => 8.75,
                'preco_venda' => 15.85,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'nome' => 'Calça Jeans',
                'marca' => 'Marca G',
                'descricao' => 'Calça jeans com corte moderno e excelente caimento.',
                'unidade_medida' => 'UN',
                'categoria' => 'Vestuário',
                'preco_custo' => 89.90,
                'preco_venda' => 140.00,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'nome' => 'Cadeira Escritório',
                'marca' => 'Marca H',
                'descricao' => 'Cadeira de escritório ergonômica e confortável.',
                'unidade_medida' => 'UN',
                'categoria' => 'Geral',
                'preco_custo' => 180.00,
                'preco_venda' => 200.00,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'nome' => 'Mouse Sem Fio',
                'marca' => 'Marca I',
                'descricao' => 'Mouse sem fio com design ergonômico e alta precisão.',
                'unidade_medida' => 'UN',
                'categoria' => 'Eletrônicos',
                'preco_custo' => 55.00,
                'preco_venda' => 100.00,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'nome' => 'Açúcar Refinado',
                'marca' => 'Marca J',
                'descricao' => 'Açúcar refinado de alta qualidade.',
                'unidade_medida' => 'KG',
                'categoria' => 'Alimentos',
                'preco_custo' => 6.20,
                'preco_venda' => 10.10,
                'created_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
