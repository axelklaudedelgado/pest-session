<?php

use App\Services\Calculator;

describe('Calculator', function () {
    beforeEach(function () {
        $this->calculator = new Calculator();
    });

    it('adds two numbers', function () {
        expect($this->calculator->add(2, 3))->toBe(5);
    });

    it('subtracts two numbers', function () {
        expect($this->calculator->subtract(5, 2))->toBe(3);
    });
});