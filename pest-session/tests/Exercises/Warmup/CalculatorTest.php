<?php

namespace Tests\Exercises\Warmup;

use App\Services\Calculator;
use PHPUnit\Framework\TestCase;

/**
 * EXERCISE 1 — Warm-up: Syntax Translation
 * --------------------------------------------------
 * Convert this PHPUnit test class into Pest syntax.
 * No Laravel dependencies — pure PHP, pure syntax practice.
 *
 * TASKS:
 *   1. Remove the class declaration and "extends TestCase".
 *   2. Replace setUp() with beforeEach().
 *   3. Replace each test method with it('...', function () { ... }).
 *   4. Replace $this->assertEquals() with expect()->toBe() etc.
 *
 * BONUS: Collapse the three "add" tests into ONE test using ->with([...]).
 *
 * Run this file while you work on it:
 *   vendor/bin/pest tests/Exercises/01-Warmup/CalculatorTest.php
 */
class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->calculator = new Calculator();
    }

    public function test_it_adds_two_positive_numbers(): void
    {
        $result = $this->calculator->add(2, 3);

        $this->assertEquals(5, $result);
    }

    public function test_it_adds_a_negative_and_positive_number(): void
    {
        $result = $this->calculator->add(-2, 5);

        $this->assertEquals(3, $result);
    }

    public function test_it_adds_two_negative_numbers(): void
    {
        $result = $this->calculator->add(-2, -3);

        $this->assertEquals(-5, $result);
    }

    public function test_it_subtracts_two_numbers(): void
    {
        $result = $this->calculator->subtract(10, 4);

        $this->assertEquals(6, $result);
    }

    public function test_it_checks_if_a_number_is_even(): void
    {
        $this->assertTrue($this->calculator->isEven(4));
        $this->assertFalse($this->calculator->isEven(7));
    }
}
