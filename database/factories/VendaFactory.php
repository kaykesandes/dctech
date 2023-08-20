<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Venda;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venda>
 */
class VendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name,
            'cpf' => fake()->cpf(false),
            'contato' => fake()->phoneNumber,
            'item' => fake()->word,
            'quantidade' => fake()->numberBetween(10, 90),
            'valor_unitario' => fake()->numberBetween(100, 900),
            'forma_pagamento' => fake()->randomElement(Venda::FORMAS_PAGAMENTOS),
        ];
    }
}
