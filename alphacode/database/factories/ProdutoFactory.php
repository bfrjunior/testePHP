<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'descricao' =>$this->faker->randomElement(['Televisão', 'Mouse', 'Computador', 'Teclado']),
            'valor_unitario' => $this->faker->randomFloat(2, 10, 100),
            'desconto' => $this->faker->randomFloat(2, 0, 20),
            'quantidade' => $this->faker->numberBetween(0, 100),
        ];
    }
}
