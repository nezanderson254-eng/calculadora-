<?php
namespace App\Services;

use InvalidArgumentException;

class CalculadoraService
{
    public function calcular(float $a, float $b, string $operacion): float
    {
        return match ($operacion) {
            'sumar' => $a + $b,
            'restar' => $a - $b,
            'multiplicar' => $a * $b,
            'dividir' => $b != 0.0 ? $a / $b : throw new InvalidArgumentException('No se puede dividir entre cero.'),
            default => throw new InvalidArgumentException('Operación no válida.'),
        };
    }
}
