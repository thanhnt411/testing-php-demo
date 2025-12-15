<?php

test('basic value and type check', function () {
    $isTrue = true;

    expect($isTrue)->toBeTrue();
});

test('basic array', function () {
    $users = ['Nam', 'Thanh', 'Nhat'];

    expect($users)->toBeArray()->toContain('Nhat')->not->toContain('Minh');
});

test('it throws an exception when dividing by zero', function () {
    $divide = function ($a, $b) {
        if ($b === 0) {
            throw new \InvalidArgumentException("Cannot divide by zero.");
        }
        return $a / $b;
    };

    expect(fn() => $divide(10, 0))
        ->toThrow(\InvalidArgumentException::class, 'Cannot divide by zero.');

    expect(fn() => $divide(10, 2))
        ->not->toThrow(\InvalidArgumentException::class);
});

test('basic value', function () {
    $a = 10;
    expect($a)->toBeInt()->toBe(10)->not->toBe(7);
});
