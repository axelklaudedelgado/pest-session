<?php

use App\Services\Calculator;

/**
 * EXERCISE 1 — SOLUTION
 *
 * What changed:
 *   - No class, no "extends TestCase", no namespace declaration.
 *   - beforeEach() replaces setUp(). $this still works inside closures —
 *     Pest binds it to the TestCase instance just like PHPUnit did.
 *   - expect()->toBe() replaces assertEquals().
 *   - The three "add" tests collapsed into ONE test with a dataset.
 *     Each named key becomes its own line in the terminal output.
 * 
 *  Run this file:
 *   vendor/bin/pest tests/Solutions/Warmup/CalculatorTest.php
 */

beforeEach(function () {
    $this->calculator = new Calculator();
});

it('adds two numbers correctly', function (float $a, float $b, float $expected) {
    expect($this->calculator->add($a, $b))->toBe($expected);
})->with([
    'two positive numbers'          => [2, 3, 5],
    'a negative and a positive'     => [-2, 5, 3],
    'two negative numbers'          => [-2, -3, -5],
]);

it('subtracts two numbers', function () {
    expect($this->calculator->subtract(10, 4))->toBe(6.0);
});

it('checks if a number is even', function () {
    expect($this->calculator->isEven(4))->toBeTrue();
    expect($this->calculator->isEven(7))->toBeFalse();
});
