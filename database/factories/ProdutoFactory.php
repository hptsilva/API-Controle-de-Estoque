<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    public function definition()
    {
        return [
            'nome' => $this->faker->word,
            'categoria' => $this->faker->randomElement(['1', '2', '3']),
            'marca' => $this->faker->randomElement(['1', '2', '3', '4', '5']),
            'descricao' => $this->faker->sentence,
            'unidade_medida' => $this->faker->randomElement(['1', '2', '3', '4', '5']),
            'quantidade' => 0,
            'preco_custo' => $this->faker->randomFloat(2, 1, 100),
            'preco_venda' => $this->faker->randomFloat(2, 1, 150),
        ];
    }
}