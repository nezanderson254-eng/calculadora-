<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CalculationFactory extends Factory
{
    public function definition(): array
    {
        $a = fake()->randomFloat(2, 1, 100);
        $b = fake()->randomFloat(2, 1, 100);
        return [
            'num1' => $a,
            'num2' => $b,
            'operation' => 'sumar',
            'result' => $a + $b,
        ];
    }
}
