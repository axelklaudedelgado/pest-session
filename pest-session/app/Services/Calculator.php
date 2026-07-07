<?php

namespace App\Services;

class Calculator
{
    public function add(float $a, float $b): float
    {
        return $a + $b;
    }

    public function subtract(float $a, float $b): float
    {
        return $a - $b;
    }

    public function divide(float $a, float $b): float
    {
        if ($b === 0.0) {
            throw new \InvalidArgumentException('Cannot divide by zero.');
        }

        return $a / $b;
    }

    public function isEven(int $number): bool
    {
        return $number % 2 === 0;
    }
}